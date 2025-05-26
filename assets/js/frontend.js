jQuery(document).ready(function ($) {
  $(document).on("click", ".dstab-tab-title", function (e) {
    e.preventDefault();

    const $tab = $(this);
    const $tabs = $tab.closest(".dstab-tabs");
    const tabIndex = $tab.data("tab");

    // Update active tab
    $tabs
      .find(".dstab-tab-title")
      .removeClass("dstab-active")
      .attr("aria-selected", "false")
      .attr("tabindex", "-1");

    $tab
      .addClass("dstab-active")
      .attr("aria-selected", "true")
      .attr("tabindex", "0");

    // Update active content
    $tabs
      .find(".dstab-tab-content")
      .removeClass("dstab-active")
      .attr("hidden", "hidden");

    $tabs
      .find('.dstab-tab-content[data-tab="' + tabIndex + '"]')
      .addClass("dstab-active")
      .removeAttr("hidden");
  });

  // Keyboard navigation
  $(document).on("keydown", ".dstab-tab-title", function (e) {
    const $tab = $(this);
    const $tabs = $tab.closest(".dstab-tabs");
    const $tabList = $tabs.find(".dstab-tab-title");
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
