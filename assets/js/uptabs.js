  jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/uptabs.default",
      function ($scope, $) {
        const $tabs = $scope.find(".uptabs-tabs");
        const $tabButtons = $tabs.find(".uptabs-tab-title");
        const $tabContents = $tabs.find(".uptabs-tab-content");

        // Get the widget ID from the scope
        const widgetId = $scope.attr("data-id") || "uptabs-default";
        const storageKey = `uptabs_active_tab_${widgetId}`;

        // Initialize tabs
        function initTabs() {
          // Get active tab from localStorage (frontend) or Elementor state (editor)
          let activeTab;

          if (elementorFrontend.isEditMode()) {
            // In editor, try to get from Elementor's memory
            activeTab =
              window.sessionStorage.getItem(storageKey) ||
              $tabs.data("active-tab") ||
              1;
          } else {
            // In frontend, use localStorage
            activeTab =
              localStorage.getItem(storageKey) || $tabs.data("active-tab") || 1;
          }

          // Convert to number
          activeTab = parseInt(activeTab);

          // Activate the tab
          function activateTab(tabNum) {
            $tabButtons
              .removeClass("uptabs-active")
              .attr({ "aria-selected": "false", tabindex: "-1" });

            $tabContents
              .removeClass("uptabs-active")
              .attr("hidden", "hidden");

            $tabButtons
              .filter(`[data-tab="${tabNum}"]`)
              .addClass("uptabs-active")
              .attr({ "aria-selected": "true", tabindex: "0" });

            $tabContents
              .filter(`[data-tab="${tabNum}"]`)
              .addClass("uptabs-active")
              .removeAttr("hidden");

            // Store the active tab
            if (elementorFrontend.isEditMode()) {
              window.sessionStorage.setItem(storageKey, tabNum);
            } else {
              localStorage.setItem(storageKey, tabNum);
            }
          }

          // Set click handlers
          $tabButtons.off("click").on("click", function () {
            const tabNum = parseInt($(this).data("tab"));
            activateTab(tabNum);
          });

          // Activate initial tab
          activateTab(activeTab);
        }

        // Initialize tabs
        initTabs();

        // Handle Elementor's preview refresh
        if (elementorFrontend.isEditMode()) {
          // Listen for content changes
          $scope.on("change", function () {
            initTabs();
          });

          // Reinitialize when panel is closed
          elementor.channels.editor.on("change", function () {
            initTabs();
          });
        }
      }
    );
  });
  

