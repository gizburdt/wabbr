<?php

if (! defined('ABSPATH')) {
    exit;
}

class WabbrSidebar extends WabbrShortcode
{
    /**
     * Shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('sidebar', array(&$this, 'sidebar'));
    }

    /**
     * Sidebar.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function sidebar($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'name'  => '',
            'class' => ''
        ), $atts));

        // View
        Wabbr::view('sidebar', array(
            'name'       => $name,
            'class'      => $class
        ));
    }
}
