<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link        http://frebro.com
 * @since       1.0.0
 *
 * @package     Vanish
 * @subpackage  Vanish/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name and version.
 *
 * @package     Vanish
 * @subpackage  Vanish/admin
 * @author      Fredrik Broman <frebro@gmail.com>
 */
class Vanish_Admin {

  /**
   * The ID of this plugin.
   *
   * @since     1.0.0
   * @access    private
   * @var       string      $vanish     The ID of this plugin.
   */
  private $vanish;

  /**
   * The version of this plugin.
   *
   * @since     1.0.0
   * @access    private
   * @var       string      $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since     1.0.0
   * @param     string      $vanish     The name of this plugin.
   * @param     string      $version    The version of this plugin.
   */
  public function __construct( $vanish, $version ) {

    $this->vanish = $vanish;
    $this->version = $version;

  }

  public function add_theme_page() {

    add_theme_page(
      'Vanish',
      'Vanish',
      'edit_theme_options',
      'vanish',
      array( $this, 'add_theme_page_callback')
    );
  }

  public function add_theme_page_callback() {
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/vanish-admin-display.php';
  }

}
