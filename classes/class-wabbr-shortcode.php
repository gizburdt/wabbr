<?php

if (! defined('ABSPATH')) {
    exit;
}

class Wabbr_Shortcode
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('init', array(&$this, 'add_shortcodes'));
    }
}
