=== Plugin Name ===
Contributors: frebro
Donate link: http://frebro.com
Tags: code, css, template
Requires at least: 3.4.0
Tested up to: 4.1.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin for making elements "vanish" from your Wordpress site.

== Description ==

Sometimes you just want to get rid of stuff in a theme but you don't have the skill or capability to edit it's source code. Maybe because you don't have access to it, or because you don't want to risk your modifications being destroyed in future updates.

The Vanish plugin lets you specify CSS-selectors of elements to be hidden in your theme. A style block is inserted in `<head>` which hides all matching elements from view. They are still present in the source code, they will just be invisible.

== Installation ==

1. Upload the plugin directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Navigate to `Admin > Appearance > Customize` and enter CSS selectors in the Vanish section to make stuff... vanish

== Frequently Asked Questions ==

= How do I find the right selector for an element? =

Take a look at [this blog post](https://dailypost.wordpress.com/2013/07/25/css-selectors/) for a simple guide to inspecting elements.

== Screenshots ==

1. Vanish settings are available in the Theme Customizer.
2. Example of generated styles

== Changelog ==

= 1.0.1 =
* Code cleanup
* Vanish applies to login pages

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.1 =
Vanish now applies to login pages as well
