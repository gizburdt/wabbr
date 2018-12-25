<?php

/*
Plugin Name:    Wabbr
Plugin URI:     http://github.com/gizburdt
Description:    Awesome shortcodes!
Version:        0.2.2
Author:         Gizburdt
Author URI:     http://gizburdt.com
License:        GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Wabbr')) :

/**
 * Wabbr.
 */
class wabbr
{
    /**
     * Instance.
     *
     * @var object
     */
    private static $instance;

    /**
     * Create instance.
     *
     * @return object
     */
    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
            self::$instance->setupConstants();
            self::$instance->includes();
            self::$instance->addHooks();
            self::$instance->execute();
            self::$instance->options();
        }

        return self::$instance;
    }

    /**
     * Setup constants.
     */
    public function setupConstants()
    {
        if (!defined('WABBR_VERSION')) {
            define('WABBR_VERSION', '0.2.2');
        }

        if (!defined('WABBR_DIR')) {
            define('WABBR_DIR', plugin_dir_path(__FILE__));
        }

        if (!defined('WABBR_URL')) {
            define('WABBR_URL', plugin_dir_url(__FILE__));
        }
    }

    /**
     * Includes.
     */
    public function includes()
    {
        include WABBR_DIR.'app/shortcode.php';

        // Wordpress
        include WABBR_DIR.'app/menu.php';
        include WABBR_DIR.'app/posts.php';
        include WABBR_DIR.'app/sidebar.php';

        // HTML
        include WABBR_DIR.'app/components.php';
        include WABBR_DIR.'app/grid.php';
        include WABBR_DIR.'app/button.php';
        include WABBR_DIR.'app/icon.php';
        include WABBR_DIR.'app/text.php';
        include WABBR_DIR.'app/table.php';
        include WABBR_DIR.'app/gmaps.php';
        include WABBR_DIR.'app/iframe.php';
    }

    /**
     * Add hooks.
     */
    public function addHooks()
    {
        // Styles
        add_action('wp_enqueue_scripts', [&$this, 'registerStyles']);
        add_action('wp_enqueue_scripts', [&$this, 'enqueueStyles']);

        // Scripts
        add_action('wp_enqueue_scripts', [&$this, 'registerScripts']);
        add_action('wp_enqueue_scripts', [&$this, 'enqueueScripts']);
    }

    /**
     * Execute.
     */
    public function execute()
    {
        // Wordpress
        self::$instance->menu = new WabbrMenu();
        self::$instance->posts = new WabbrPosts();
        self::$instance->table = new WabbrSidebar();

        // HTML
        self::$instance->components = new WabbrComponents();
        self::$instance->grid = new WabbrGrid();
        self::$instance->text = new WabbrText();
        self::$instance->button = new WabbrButton();
        self::$instance->button = new WabbrIcon();
        self::$instance->table = new WabbrTable();
        self::$instance->gmaps = new WabbrGmaps();
        self::$instance->iframe = new WabbrIframe();
    }

    /**
     * Options.
     */
    public function options()
    {
        self::$instance->gmaps->key = '';
    }

    /**
     * Register styles.
     */
    public function registerStyles()
    {
        wp_register_style('wabbr', WABBR_URL.'public/css/wabbr.css', false, WABBR_VERSION, 'screen');
    }

    /**
     * Enqueue styles.
     */
    public function enqueueStyles()
    {
        wp_enqueue_style('wabbr');
    }

    /**
     * Register scripts.
     */
    public function registerScripts()
    {
        wp_register_script('wabbr', WABBR_URL.'public/js/wabbr.js', null, WABBR_VERSION);

        if (!empty(self::$instance->gmaps->key) && $key = self::$instance->gmaps->key) {
            wp_register_script('wabbr-gmaps', 'https://maps.googleapis.com/maps/api/js?key='.$key.'&sensor=true', false, WABBR_VERSION, 'screen');
        }
    }

    /**
     * Enqueue scripts.
     */
    public function enqueueScripts()
    {
        // wp_enqueue_script( 'wabbr' );
        // wp_enqueue_script( 'wabbr-gmaps' );

        // self::localizeScripts();
    }

    /**
     * Localize scripts.
     *
     * @return [type] [description]
     */
    public function localizeScripts()
    {
        wp_localize_script('wabbr', 'Wabbr', [
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ]);
    }

    /**
     * Include view file.
     *
     * @param string $view
     * @param array  $variables
     *
     * @since 3.0
     */
    public static function view($view, $variables = [])
    {
        extract($variables);

        include WABBR_DIR.'/resources/views/'.$view.'.php';
    }
}

endif; // End class_exists check

Wabbr::instance();
