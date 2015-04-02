![](https://img.shields.io/wordpress/v/vanish.svg)
![](https://img.shields.io/wordpress/plugin/v/vanish.svg)
![](https://img.shields.io/wordpress/plugin/r/vanish.svg)
![](https://img.shields.io/wordpress/plugin/dt/vanish.svg)

# Vanish for Wordpress

This is a plugin for making elements "vanish" from your Wordpress site. Requires Wordpress 3.4.

### How?

By letting you specify CSS-selectors of elements to be hidden in your theme. A style block is inserted in `<head>` which hides all matching elements from view. They are still present in the source code, they will just be invisible.

### Why?

Sometimes you just want to get rid of something in a theme that you bought, but you don't have the skill or capability to edit it's source code. Maybe because you don't have access to it, or because you don't want to risk your changes being destroyed in future updates.

_Example of generated styles._

### Install Vanish

[Locate Vanish](https://wordpress.org/plugins/vanish/) in the Wordpress Plugin directory and install in the usual fashion.

—or—

Require `wpackagist-plugin/vanish` with [Composer](https://getcomposer.org/) from [WordPress Packagist](http://wpackagist.org/).

—or—

[Download a release](https://github.com/frebro/wp-vanish/releases) and install manually.

### Remove Vanish

Changed your mind? Don't worry, just deactivate and remove the plugin. No changes were made to your theme and your vanished elements will be restored.

### Todo

- Localize
- Live code preview in Customizer
