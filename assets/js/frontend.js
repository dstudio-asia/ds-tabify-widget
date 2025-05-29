jQuery(document).ready(function ($) {
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

  // // Keyboard navigation
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


  console.log('Elementor frontend initialized');
  $(window).on("elementor/frontend/init", function () {
    const widgetHandler = function ($scope, $) {
      const $tabs = $scope.find(".dstabify-tabs");
      const $tabButtons = $tabs.find(".dstabify-tab-title");
      const $tabContents = $tabs.find(".dstabify-tab-content");
      const widgetId = $scope.attr("data-id");
      const localStorageKey = "dstabify_active_tab_" + widgetId;

      // Load from localStorage or default
      let activeTab =
        localStorage.getItem(localStorageKey) || $tabs.data("active-tab") || 1;

      // Reset all tabs
      $tabButtons
        .removeClass("dstabify-active")
        .attr({ "aria-selected": "false", tabindex: "-1" });
      $tabContents.removeClass("dstabify-active").attr("hidden", "hidden");

      // Activate saved tab
      $tabs
        .find(`.dstabify-tab-title[data-tab="${activeTab}"]`)
        .addClass("dstabify-active")
        .attr({ "aria-selected": "true", tabindex: "0" });
      $tabs
        .find(`.dstabify-tab-content[data-tab="${activeTab}"]`)
        .addClass("dstabify-active")
        .removeAttr("hidden");
      $tabs.attr("data-active-tab", activeTab);

      // Tab click handler
      $tabButtons.on("click", function () {
        const tabNum = $(this).data("tab");
        localStorage.setItem(localStorageKey, tabNum);
        location.reload(); // optional: only use if needed to re-render
      });
    };

    elementorFrontend.hooks.addAction(
      "frontend/element_ready/dstabify-tabs.default",
      widgetHandler
    );
  });


});




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

