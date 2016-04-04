<?php

class Wabbr_Gmaps extends Wabbr_Shortcode
{
    /**
     * Shortcodes.
     */
    public function __construct()
    {
        parent::__construct();

        add_action('wp_head', array(&$this, 'wp_head'));
    }

    /**
     * Head.
     *
     * @return string
     */
    public function wp_head()
    {
        global $post;

        if (isset($post) && isset($post->post_content) && has_shortcode($post->post_content, 'gmaps')) {
            Wabbr::view('maps/head');
        }
    }

    /**
     * Add shortcodes.
     */
    public function add_shortcodes()
    {
        add_shortcode('gmaps', array(&$this, 'gmaps'));
    }

    /**
     * Google maps.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function gmaps($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'key'       => '',
            'class'     => '',
        ), $atts));

        return '<div id="map-canvas"/>';
    }
}
