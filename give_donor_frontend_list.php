<?php

	/*
	   Plugin Name: Give - Donor Frontend List
	   Plugin URI: http://github.com/sharmaghanshyam
	   description: A plugin to show donor list on front end with specific campagin
	   Version: 1.0
	   Author: Ghanshyam Sharma
	   Author URI: http://github.com/sharmaghanshyam
	   License: GPL2
   */
	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	/**
	 * Main Give Donor Frontend List Class
	 *
	 * @since 1.0
	 */
	final class Give_donor_frontend_list{
		
		/**
		 * Give Instance
		 *
		 * @since  1.0
		 * @access private
		 *
		 * @var    Give() The one true Give
		 */
		protected static $_instance;
		
		/**
		 * Give Donors DB Object
		 *
		 * @since  1.0
		 * @access public
		 *
		 * @var    Give_DB_Donors object
		 */
		public $donors;

		/**
		 * Main Give Instance
		 *
		 * Ensures that only one instance of Give exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @since     1.0
		 * @access    public
		 *
		 * @static
		 * @see       Give()
		 *
		 * @return    Give
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
		/**
		 * Give Donor Frontend List Constructor.
		 */
		public function __construct() {
			// PHP version
			if ( ! defined( 'GIVE_REQUIRED_PHP_VERSION' ) ) {
				define( 'GIVE_REQUIRED_PHP_VERSION', '5.3' );
			}

			// Bailout: Need minimum php version to load plugin.
			if ( function_exists( 'phpversion' ) && version_compare( GIVE_REQUIRED_PHP_VERSION, phpversion(), '>' ) ) {
				add_action( 'admin_notices', array( $this, 'minimum_phpversion_notice' ) );

				return;
			}

			$this->setup_constants();
			$this->includes();
			//$this->init_hooks();

			do_action( 'give_donor_frontend_list_loaded' );
		}
		/**
		 * Setup plugin constants
		 *
		 * @since  1.0
		 * @access private
		 *
		 * @return void
		 */
		private function setup_constants() {

			// Plugin version.
			if ( ! defined( 'GIVE_VERSION' ) ) {
				define( 'GIVE_VERSION', '2.3.0' );
			}

			// Plugin Root File.
			if ( ! defined( 'GIVE_PLUGIN_FILE' ) ) {
				define( 'GIVE_PLUGIN_FILE', __FILE__ );
			}

			// Plugin Folder Path.
			if ( ! defined( 'GIVE_PLUGIN_DIR' ) ) {
				define( 'GIVE_PLUGIN_DIR', plugin_dir_path( GIVE_PLUGIN_FILE ) );
			}

			// Plugin Folder URL.
			if ( ! defined( 'GIVE_PLUGIN_URL' ) ) {
				define( 'GIVE_PLUGIN_URL', plugin_dir_url( GIVE_PLUGIN_FILE ) );
			}

			// Plugin Basename aka: "give_donor_frontend_list/give_donor_frontend_list.php".
			if ( ! defined( 'GIVE_PLUGIN_BASENAME' ) ) {
				define( 'GIVE_PLUGIN_BASENAME', plugin_basename( GIVE_PLUGIN_FILE ) );
			}

			
		}
		
		/**
		 * Include required files
		 *
		 * @since  1.0
		 * @access private
		 *
		 * @return void
		 */
		private function includes() {
			global $give_options;

			/**
			 * Load plugin files
			 */
			 $dir = plugin_dir_path( __DIR__ );
			require_once $dir . 'give_donor_frontend_list/shortcode.php';
			
		}
		
		
	}	
	
	
	 /**
 * Start Give
 *
 * The main function responsible for returning the one true Give instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $give_donor_frontend_list = Give_donor_frontend_list(); ?>
 *
 * @since 1.0
 * @return object|Give_donor_frontend_list
 */
function Give_donor_frontend_list() {
	return Give_donor_frontend_list::instance();
}

Give_donor_frontend_list();

   
   
   
?>
