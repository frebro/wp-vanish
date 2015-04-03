<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://frebro.com
 * @since      1.0.0
 *
 * @package    Vanish
 * @subpackage Vanish/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Vanish
 * @subpackage Vanish/includes
 * @author     Fredrik Broman <frebro@gmail.com>
 */
class Vanish {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power
   * the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      Vanish_Loader  $loader   Maintains and registers all hooks for the plugin.
   */
  protected $loader;

  /**
   * The unique identifier of this plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      string     $vanish       The string used to uniquely identify this plugin.
   */
  protected $vanish;

  /**
   * The current version of the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      string     $version      The current version of the plugin.
   */
  protected $version;

  /**
   * Define the core functionality of the plugin.
   *
   * Set the plugin name and the plugin version that can be used throughout the plugin.
   * Load the dependencies, define the locale, and set the hooks for the admin area and
   * the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function __construct( $basename ) {

    $this->basename = $basename;
    $this->name = 'vanish';
    $this->version = '1.0.2';

    $this->load_dependencies();
    $this->set_locale();
    $this->define_admin_hooks();
    $this->define_public_hooks();

  }

  /**
   * Load the required dependencies for this plugin.
   *
   * Include the following files that make up the plugin:
   *
   * - Vanish_Loader. Orchestrates the hooks of the plugin.
   * - Vanish_i18n. Defines internationalization functionality.
   * - Vanish_Admin. Defines all hooks for the admin area.
   * - Vanish_Public. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */
  private function load_dependencies() {

    /**
     * The class responsible for orchestrating the actions and filters of the
     * core plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-vanish-loader.php';

    /**
     * The class responsible for defining internationalization functionality
     * of the plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-vanish-i18n.php';

    /**
     * The class responsible for defining all actions that occur in the admin area.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-vanish-admin.php';

    /**
     * The class responsible for defining all actions that occur in the public-facing
     * side of the site.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-vanish-public.php';

    $this->loader = new Vanish_Loader();

  }

  /**
   * Define the locale for this plugin for internationalization.
   *
   * Uses the Vanish_i18n class in order to set the domain and to register the hook
   * with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */
  private function set_locale() {

    $plugin_i18n = new Vanish_i18n();
    $plugin_i18n->set_domain( $this->get_name() );

    $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

  }

  /**
   * Register all of the hooks related to the admin area functionality
   * of the plugin.
   *
   * @since    1.0.0
   * @access   private
   */
  private function define_admin_hooks() {

    $plugin_admin = new Vanish_Admin( $this->get_name(), $this->get_version() );

    $this->loader->add_action( 'customize_register', $plugin_admin, 'vanish_customize_register' );
    $this->loader->add_action( 'login_head', $plugin_admin, 'vanish_login_head' );

    $this->loader->add_filter( 'plugin_action_links_'.$this->get_basename(), $plugin_admin, 'vanish_add_action_links' );

  }

  /**
   * Register all of the hooks related to the public-facing functionality
   * of the plugin.
   *
   * @since    1.0.0
   * @access   private
   */
  private function define_public_hooks() {

    $plugin_public = new Vanish_Public( $this->get_name(), $this->get_version() );

    $this->loader->add_action( 'wp_head', $plugin_public, 'vanish_wp_head' );

  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since    1.0.0
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The basename relative to the main plugin file, used to construct
   * namespaced action and filter hooks.
   *
   * @since     1.0.2
   * @return    string    The basename of the plugin.
   */
  public function get_basename() {
    return $this->basename;
  }

  /**
   * The name of the plugin used to uniquely identify it within the context of
   * WordPress and to define internationalization functionality.
   *
   * @since     1.0.2
   * @return    string    The name of the plugin.
   */
  public function get_name() {
    return $this->name;
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   *
   * @since     1.0.0
   * @return    Vanish_Loader    Orchestrates the hooks of the plugin.
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * Retrieve the version number of the plugin.
   *
   * @since     1.0.0
   * @return    string    The version number of the plugin.
   */
  public function get_version() {
    return $this->version;
  }

}
