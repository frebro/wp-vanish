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


  /**
   * Register Theme Customize settings
   *
   * @since     1.0.0
   * @param     WP_Customize_Manager      $wp_customize     Passed by hook to lend access to customize manager
   */
  public function vanish_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'vanish' , array(
      'title'       => __( 'Vanish', 'vanish' ),
      'description' => __('Select elements with CSS to make them vanish. Separate multiple selectors with comma. <a href="https://wordpress.org/plugins/vanish/faq/" target="_blank">[FAQ]</a>', 'vanish')
    ));

    $wp_customize->add_setting( 'vanish_selectors', array(
      'sanitize_callback' => array($this, 'vanish_sanitize_selectors')
    ));

    $wp_customize->add_control( 'vanish_selectors', array(
      'type'    => 'text',
      'section' => 'vanish',
      'label'   => __('Selectors', 'vanish')
    ));

  }

  /**
   * Sanitize selectors
   *
   * @since     1.0.0
   * @param     string      $selectors     User input from the vanish_selectors control
   *
   * We are using the built-in sanitize_html_class function to verify
   * CSS selectors. The function only accepts single selectors, so first
   * we need to separate multiple selectors, and then separate those
   * further into selector parts.
   */
  public function vanish_sanitize_selectors( $selectors ) {

    // Explode multiple selectors
    $selectors = explode( ',', $selectors );

    // Sanitize selectors
    if ( is_array( $selectors ) ) {

      foreach ( $selectors as $selector ) {
        $selector = explode( ' ', $selector );

        if ( is_array( $selector ) ) {
          $selector = array_map( 'sanitize_html_class', $selector );
          $selector = implode( ' ', $selector );
        } else {
          $selector = sanitize_html_class( $selector );
        }
      }

      $selectors = implode( ',', $selectors );

    } else {
      $selectors = sanitize_html_class( $selectors );
    }

    return $selectors;
  }

  /**
   * Login head callback
   *
   * @since     1.0.1
   */
  public function vanish_login_head() {
    echo '<style type="text/css"> /* Inserted by Vanish plugin https://wordpress.org/plugins/vanish/ */ '.get_theme_mod('vanish_selectors').' {display:none!important;visibility:hidden!important;}</style>';
  }

  /**
   * Add action links callback
   *
   * @since     1.0.2
   * @param     array      $links     Default action links
   */
  public function vanish_add_action_links( $links ) {
    return array_merge( $links, array(
      'settings' => '<a href="'. get_admin_url(null, 'customize.php') .'">Settings</a>'
    ));
  }

}
