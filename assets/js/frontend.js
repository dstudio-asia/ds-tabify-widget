
  // $(document).on("click", ".dstabify-tab-title", function (e) {
  //   e.preventDefault();

  //   const $tab = $(this);
  //   const $tabs = $tab.closest(".dstabify-tabs");
  //   const tabIndex = $tab.data("tab");

  //   // Update active tab
  //   $tabs
  //     .find(".dstabify-tab-title")
  //     .removeClass("dstabify-active")
  //     .attr("aria-selected", "false")
  //     .attr("tabindex", "-1");

  //   $tab
  //     .addClass("dstabify-active")
  //     .attr("aria-selected", "true")
  //     .attr("tabindex", "0");

  //   // Update active content
  //   $tabs
  //     .find(".dstabify-tab-content")
  //     .removeClass("dstabify-active")
  //     .attr("hidden", "hidden");

  //   $tabs
  //     .find('.dstabify-tab-content[data-tab="' + tabIndex + '"]')
  //     .addClass("dstabify-active")
  //     .removeAttr("hidden");
  // });

  // Keyboard navigation
  // $(document).on("keydown", ".dstabify-tab-title", function (e) {
  //   const $tab = $(this);
  //   const $tabs = $tab.closest(".dstabify-tabs");
  //   const $tabList = $tabs.find(".dstabify-tab-title");
  //   const currentIndex = $tabList.index($tab);

  //   switch (e.key) {
  //     case "ArrowLeft":
  //     case "ArrowUp":
  //       e.preventDefault();
  //       const prevIndex =
  //         (currentIndex - 1 + $tabList.length) % $tabList.length;
  //       $tabList.eq(prevIndex).trigger("click").focus();
  //       break;

  //     case "ArrowRight":
  //     case "ArrowDown":
  //       e.preventDefault();
  //       const nextIndex = (currentIndex + 1) % $tabList.length;
  //       $tabList.eq(nextIndex).trigger("click").focus();
  //       break;

  //     case "Home":
  //       e.preventDefault();
  //       $tabList.first().trigger("click").focus();
  //       break;

  //     case "End":
  //       e.preventDefault();
  //       $tabList.last().trigger("click").focus();
  //       break;
  //   }
  // });


 

  // jQuery(window).on("elementor/frontend/init", function () {
  //   elementorFrontend.hooks.addAction(
  //     "frontend/element_ready/dstabify.default",
  //     function ($scope, $) {
  //       const $tabs = $scope.find(".dstabify-tabs");
  //       const $tabButtons = $tabs.find(".dstabify-tab-title");
  //       const $tabContents = $tabs.find(".dstabify-tab-content");

  //       // Initialize tabs on load
  //       function initTabs() {
  //         const widgetId = $tabs.attr("data-id") || "dstabify-default";
  //         const localStorageKey = "dstabify_active_tab_" + widgetId;

  //         // Don't use localStorage in editor mode
  //         if (elementorFrontend.isEditMode()) {
  //           localStorage.removeItem(localStorageKey);
  //         }

  //         let activeTab = parseInt($tabs.data("active-tab")) || 1;

  //         function activateTab(tabNum) {
  //           $tabButtons
  //             .removeClass("dstabify-active")
  //             .attr({ "aria-selected": "false", tabindex: "-1" });

  //           $tabContents
  //             .removeClass("dstabify-active")
  //             .attr("hidden", "hidden");

  //           $tabButtons
  //             .filter(`[data-tab="${tabNum}"]`)
  //             .addClass("dstabify-active")
  //             .attr({ "aria-selected": "true", tabindex: "0" });

  //           $tabContents
  //             .filter(`[data-tab="${tabNum}"]`)
  //             .addClass("dstabify-active")
  //             .removeAttr("hidden");

  //           // In editor mode, update the URL to persist the active tab
  //           if (elementorFrontend.isEditMode()) {
  //             const url = new URL(window.location);
  //             url.searchParams.set("active_tab", tabNum);
  //             window.history.replaceState(null, "", url);
  //           }
  //         }

  //         // Set click handlers
  //         $tabButtons.off("click").on("click", function () {
  //           const tabNum = parseInt($(this).data("tab"));
  //           if (!tabNum) return;

  //           if (!elementorFrontend.isEditMode()) {
  //             localStorage.setItem(localStorageKey, tabNum);
  //           }
  //           activateTab(tabNum);
  //         });

  //         // Activate initial tab
  //         activateTab(activeTab);
  //       }

  //       initTabs();

  //       // Reinitialize when Elementor does AJAX loading
  //       $(document).on("elementor/popup/show", initTabs);
  //     }
  //   );
  // });


  jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/dstabify.default",
      function ($scope, $) {
        const $tabs = $scope.find(".dstabify-tabs");
        const $tabButtons = $tabs.find(".dstabify-tab-title");
        const $tabContents = $tabs.find(".dstabify-tab-content");

        // Get the widget ID from the scope
        const widgetId = $scope.attr("data-id") || "dstabify-default";
        const storageKey = `dstabify_active_tab_${widgetId}`;

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
              .removeClass("dstabify-active")
              .attr({ "aria-selected": "false", tabindex: "-1" });

            $tabContents
              .removeClass("dstabify-active")
              .attr("hidden", "hidden");

            $tabButtons
              .filter(`[data-tab="${tabNum}"]`)
              .addClass("dstabify-active")
              .attr({ "aria-selected": "true", tabindex: "0" });

            $tabContents
              .filter(`[data-tab="${tabNum}"]`)
              .addClass("dstabify-active")
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

  // jQuery(window).on("elementor:controls:init", function () {
  //   const panel = elementor.channels.editor;

  //   panel.on("section:activated", function (sectionView) {
  //     const model = sectionView.model;
  //     const controls = model.controls;

  //     if (controls && controls.position) {
  //       const currentDevice = elementor.getCurrentDeviceMode();

  //       // Optional: Prevent changing direction on mobile
  //       if (currentDevice === "mobile") {
  //         model.setSetting("position", "horizontal");

  //         // Lock control visually (optional)
  //         const $input = sectionView.$el.find('[data-setting="position"]');
  //         if ($input.length) {
  //           $input.find("input").prop("disabled", true);
  //           $input
  //             .find(".elementor-control-type-choose")
  //             .css({ opacity: 0.4, "pointer-events": "none" });
  //         }
  //       }
  //     }
  //   });
  // });
  


  
  
  




// jQuery(function ($) {
//   function activateTab($tabs, tabIndex) {
//     const $tabButtons = $tabs.find(".dstabify-tab-title");
//     const $tabContents = $tabs.find(".dstabify-tab-content");

//     $tabButtons
//       .removeClass("dstabify-active")
//       .attr({ "aria-selected": "false", tabindex: "-1" });

//     $tabContents.removeClass("dstabify-active").attr("hidden", "hidden");

//     $tabButtons
//       .filter(`[data-tab="${tabIndex}"]`)
//       .addClass("dstabify-active")
//       .attr({ "aria-selected": "true", tabindex: "0" });

//     $tabContents
//       .filter(`[data-tab="${tabIndex}"]`)
//       .addClass("dstabify-active")
//       .removeAttr("hidden");

//     $tabs.attr("data-active-tab", tabIndex);
//   }

//   function initTabs($scope) {
//     const $tabsWrapper = $scope.find(".dstabify-tabs");

//     // Debug check
//     console.log("Tabs wrapper found:", $tabsWrapper.length, $tabsWrapper);

//     if (!$tabsWrapper.length) return;

//     const widgetId = $tabsWrapper.data("id");
//     const key = `dstabify_active_tab_${widgetId}`;
//     const defaultTab = parseInt($tabsWrapper.attr("data-active-tab")) || 1;

//     // Debug info
//     console.log("Widget ID:", widgetId);
//     console.log("Default tab index:", defaultTab);

//     let activeTab = parseInt(localStorage.getItem(key)) || defaultTab;
//     console.log("Active tab from storage:", activeTab);

//     activateTab($tabsWrapper, activeTab);

//     $tabsWrapper.find(".dstabify-tab-title").on("click", function (e) {
//       e.preventDefault();
//       const tabNum = $(this).data("tab");
//       if (!tabNum) return;

//       console.log("Clicked tab:", tabNum);
//       localStorage.setItem(key, tabNum);
//       activateTab($tabsWrapper, tabNum);
//     });
//   }

//   // Elementor Editor Init
//   $(window).on("elementor/frontend/init", function () {
//     elementorFrontend.hooks.addAction(
//       "frontend/element_ready/dstabify.default",
//       function ($scope) {
//         initTabs($scope);
//       }
//     );
//   });
// });

