<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://frebro.com
 * @since      1.0.0
 *
 * @package    Vanish
 * @subpackage Vanish/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name and version.
 *
 * @package    Vanish
 * @subpackage Vanish/public
 * @author     Fredrik Broman <frebro@gmail.com>
 */
class Vanish_Public {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $vanish    The ID of this plugin.
   */
  private $vanish;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   * @param      string    $vanish       The name of the plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $vanish, $version ) {

    $this->vanish = $vanish;
    $this->version = $version;

  }

  /**
   * WP head callback
   *
   * @since     1.0.0
   */
  public function vanish_wp_head() {
    echo '<style type="text/css"> /* Inserted by Vanish plugin https://wordpress.org/plugins/vanish/ */ '.get_theme_mod('vanish_selectors').' {display:none!important;visibility:hidden!important;}</style>';
  }

}
