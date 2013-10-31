<?php

/*
Plugin Name: 	Wabbr
Plugin URI: 	http://github.com/gizburdt
Description: 	Easy and flexible shortcodes
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
		include( WABBR_DIR . 'classes/class-wabbr-grid.php' );
		include( WABBR_DIR . 'classes/class-wabbr-button.php' );
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
		$grid 		= new Wabbr_Grid();
		$button 	= new Wabbr_Button();
	}

	/**
	 * Registers styles
	 *
	 * @author 	Gijs Jorissen
	 * @since 	0.3
	 *
	 */
	function register_styles()
	{		
		wp_register_style( 'wabbr', WABBR_URL . '/assets/css/style.css', false, WABBR_VERSION, 'screen' );
	}

	/**
	 * Enqueues styles
	 *
	 * @author 	Gijs Jorissen
	 * @since 	0.3
	 *
	 */
	function enqueue_styles()
	{
		wp_enqueue_style( 'wabbr' );
	}

	/**
	 * Registers scripts
	 *
	 * @author 	Gijs Jorissen
	 * @since 	0.3
	 *
	 */
	function register_scripts()
	{
		wp_register_script( 'wabbr', WABBR_URL . '/assets/js/functions.js', null, WABBR_VERSION, true );
	}
	
	/**
	 * Enqueues scripts
	 *
	 * @author 	Gijs Jorissen
	 * @since 	0.3
	 *
	 */
	function enqueue_scripts()
	{
		wp_enqueue_script( 'wabbr' );
		
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