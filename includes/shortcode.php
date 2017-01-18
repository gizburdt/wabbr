<?php

if (! defined('ABSPATH')) {
    exit;
}

class WabbrShortcode
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('init', array(&$this, 'addShortcodes'));
    }
}
