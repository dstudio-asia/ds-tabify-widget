jQuery(document).ready(function ($) {
  $(document).on("click", ".dstabify-tab-title", function (e) {
    e.preventDefault();

    const $tab = $(this);
    const $tabs = $tab.closest(".dstabify-tabs");
    const tabIndex = $tab.data("tab");

    // Update active tab
    $tabs
      .find(".dstabify-tab-title")
      .removeClass("dstabify-active")
      .attr("aria-selected", "false")
      .attr("tabindex", "-1");

    $tab
      .addClass("dstabify-active")
      .attr("aria-selected", "true")
      .attr("tabindex", "0");

    // Update active content
    $tabs
      .find(".dstabify-tab-content")
      .removeClass("dstabify-active")
      .attr("hidden", "hidden");

    $tabs
      .find('.dstabify-tab-content[data-tab="' + tabIndex + '"]')
      .addClass("dstabify-active")
      .removeAttr("hidden");
  });

  // Keyboard navigation
  $(document).on("keydown", ".dstabify-tab-title", function (e) {
    const $tab = $(this);
    const $tabs = $tab.closest(".dstabify-tabs");
    const $tabList = $tabs.find(".dstabify-tab-title");
    const currentIndex = $tabList.index($tab);

    switch (e.key) {
      case "ArrowLeft":
      case "ArrowUp":
        e.preventDefault();
        const prevIndex =
          (currentIndex - 1 + $tabList.length) % $tabList.length;
        $tabList.eq(prevIndex).trigger("click").focus();
        break;

      case "ArrowRight":
      case "ArrowDown":
        e.preventDefault();
        const nextIndex = (currentIndex + 1) % $tabList.length;
        $tabList.eq(nextIndex).trigger("click").focus();
        break;

      case "Home":
        e.preventDefault();
        $tabList.first().trigger("click").focus();
        break;

      case "End":
        e.preventDefault();
        $tabList.last().trigger("click").focus();
        break;
    }
  });
});
