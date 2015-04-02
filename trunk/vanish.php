<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://frebro.com
 * @since             1.0.0
 * @package           Vanish
 *
 * @wordpress-plugin
 * Plugin Name:       Vanish
 * Plugin URI:        https://wordpress.org/plugins/vanish/
 * Description:       A plugin for making elements "vanish" from your Wordpress site.
 * Version:           1.0.1
 * Author:            Fredrik Broman
 * Author URI:        http://frebro.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vanish
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vanish-activator.php
 */
function activate_vanish() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vanish-activator.php';
	Vanish_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_vanish' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vanish-deactivator.php
 */
function deactivate_vanish() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vanish-deactivator.php';
	Vanish_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_vanish' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vanish.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vanish() {

	$plugin = new Vanish( plugin_basename(__FILE__) );
	$plugin->run();

}
run_vanish();
