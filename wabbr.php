<?php

/*
Plugin Name: 	Wabbr
Plugin URI: 	http://github.com/gizburdt
Description: 	Awesome shortcodes!
Version: 		0.1
Author: 		Gizburdt
Author URI: 	http://gizburdt.com
License: 		GPL2
*/

if( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'Wabbr' ) ) :

/**
 * Wabbr
 */
class Wabbr
{
	private static $instance;

	public static function instance()
	{
		if ( ! isset( self::$instance ) ) 
		{
			self::$instance = new Wabbr;
			self::$instance->setup_constants();
			self::$instance->includes();
			self::$instance->add_hooks();
			self::$instance->execute();
			self::$instance->options();
		}
		
		return self::$instance;
	}

	function setup_constants()
	{
		if( ! defined( 'WABBR_VERSION' ) ) 
			define( 'WABBR_VERSION', '0.1' );

		if( ! defined( 'WABBR_DIR' ) ) 
			define( 'WABBR_DIR', plugin_dir_path( __FILE__ ) );

		if( ! defined( 'WABBR_URL' ) ) 
			define( 'WABBR_URL', plugin_dir_url( __FILE__ ) );
	}

	function includes()
	{
		include( WABBR_DIR . 'classes/class-wabbr-shortcode.php' );

		// Wordpress
		include( WABBR_DIR . 'classes/class-wabbr-menu.php' );
		include( WABBR_DIR . 'classes/class-wabbr-posts.php' );
		include( WABBR_DIR . 'classes/class-wabbr-sidebar.php' );

		// HTML
		include( WABBR_DIR . 'classes/class-wabbr-components.php' );
		include( WABBR_DIR . 'classes/class-wabbr-grid.php' );
		include( WABBR_DIR . 'classes/class-wabbr-button.php' );
		include( WABBR_DIR . 'classes/class-wabbr-icon.php' );
		include( WABBR_DIR . 'classes/class-wabbr-text.php' );
		include( WABBR_DIR . 'classes/class-wabbr-table.php' );
		include( WABBR_DIR . 'classes/class-wabbr-gmaps.php' );
		include( WABBR_DIR . 'classes/class-wabbr-iframe.php' );
	}

	function add_hooks()
	{
		// Styles
		add_action( 'wp_enqueue_scripts',	array( &$this, 'register_styles' ) );
		add_action( 'wp_enqueue_scripts', 	array( &$this, 'enqueue_styles' ) );
		
		// Scripts
		add_action( 'wp_enqueue_scripts', 	array( &$this, 'register_scripts' ) );
		add_action( 'wp_enqueue_scripts', 	array( &$this, 'enqueue_scripts' ) );
	}

	function execute()
	{
		// Wordpress
		self::$instance->menu 		= new Wabbr_Menu;
		self::$instance->posts 		= new Wabbr_Posts;
		self::$instance->table 		= new Wabbr_Sidebar;

		// HTML
		self::$instance->components	= new Wabbr_Components;
		self::$instance->grid  		= new Wabbr_Grid;
		self::$instance->text 		= new Wabbr_Text;
		self::$instance->button 	= new Wabbr_Button;
		self::$instance->button 	= new Wabbr_Icon;
		self::$instance->table 		= new Wabbr_Table;
		self::$instance->gmaps 		= new Wabbr_Gmaps;
		self::$instance->iframe		= new Wabbr_Iframe;
	}

	function options()
	{
		self::$instance->gmaps->key = '';
	}

	function register_styles()
	{		
		wp_register_style( 'wabbr', WABBR_URL . 'assets/css/wabbr.css', false, WABBR_VERSION, 'screen' );
	}

	function enqueue_styles()
	{
		wp_enqueue_style( 'wabbr' );
	}

	function register_scripts()
	{
		wp_register_script( 'wabbr', WABBR_URL . 'assets/js/wabbr.js', null, WABBR_VERSION );

		if( ! empty( self::$instance->gmaps->key ) && $key = self::$instance->gmaps->key )
			wp_register_script( 'wabbr-gmaps', 'https://maps.googleapis.com/maps/api/js?key=' . $key . '&sensor=true', false, WABBR_VERSION, 'screen' );
	}
	
	function enqueue_scripts()
	{
		wp_enqueue_script( 'wabbr' );
		wp_enqueue_script( 'wabbr-gmaps' );
		
		self::localize_scripts();
	}

	function localize_scripts()
	{
		wp_localize_script( 'wabbr', 'Wabbr', array(
			'home_url'			=> get_home_url(),
			'ajax_url'			=> admin_url( 'admin-ajax.php' ),
			'wp_version'		=> get_bloginfo( 'version' )
		) );
	}
}

endif; // End class_exists check

Wabbr::instance();