=== UpTabs (Dstabify) ===
Contributors: yourusername
Donate link: https://yourwebsite.com
Tags: elementor, tabs, card, responsive, rtl, accessibility
Requires at least: 5.8
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Accessible, RTL-ready custom Tabs widget for Elementor.  
UpTabs lets you display tabbed card content (heading, description, image, button) with clean design, responsive behavior, and keyboard accessibility.

== Description ==

UpTabs is a custom **Elementor widget** that provides a simplified, card-based tab system.  
Unlike Elementor’s default Tabs widget, UpTabs is focused on structured cards containing:

- Heading
- Description
- Image
- Button

### Features
* Built for Elementor (drag & drop widget).
* Accessibility-ready (keyboard navigation + ARIA roles).
* RTL support (works with right-to-left languages).
* Responsive design (scrollable on mobile).
* Fluid large-screen layouts.
* Optimized HTML & CSS (DRY, minimal duplication).
* Uses Elementor controls for customization.

### Accessibility
- `role="tablist"`, `role="tab"`, `role="tabpanel"`.
- `aria-selected`, `aria-controls`, `aria-labelledby`.
- `hidden` attribute for inactive panels.
- Keyboard support:
  - Left/Right arrows (horizontal).
  - Up/Down arrows (vertical).
  - Home/End to jump to first/last tab.

### RTL Support
All alignment and spacing is handled with logical properties (`margin-inline`, `text-align: start/end`)  
so the widget works seamlessly in both **LTR** and **RTL** WordPress setups.

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/dstabify/`, or install the ZIP directly via the WordPress dashboard.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Open Elementor editor and search for **UpTabs** in the widget panel.
4. Drag it into your layout and configure tabs (title, description, image, button).

== Frequently Asked Questions ==

= Does this replace Elementor’s Tabs widget? =
No, it’s a **separate custom widget**. Elementor’s default Tabs remain available.

= Is it translation-ready? =
Yes, all strings are wrapped with `__()` or `esc_html__()`. You can translate using .po/.mo files or tools like Loco Translate.

= Does it work in RTL websites? =
Yes, tested in RTL mode with correct alignment and spacing.

= Is it accessibility-compliant? =
Yes. Keyboard navigation and ARIA attributes are included.

== Screenshots ==

1. Example of UpTabs widget in Elementor editor
2. Tabs with icons on top
3. Tabs in RTL layout
4. Mobile scrollable tabs view

== Changelog ==

= 1.0.0 =
* Initial release.
* Tabbed card widget with heading, description, image, button.
* Accessibility and RTL support.
* Responsive scrollable tabs on mobile.
* Fluid container layout for large screens.

== Upgrade Notice ==

= 1.0.0 =
First stable release.

== Credits ==

Developed by [Your Name / Company]  
Inspired by Elementor Tabs but restructured for fixed card layouts.
