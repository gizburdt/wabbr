<?php

if (! defined('ABSPATH')) {
    exit;
}

class WabbrComponents extends WabbrShortcode
{
    /**
     * Shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('block', array(&$this, 'block'));
        add_shortcode('list-group', array(&$this, 'listGroup'));
    }

    /**
     * Block.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function block($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
        ), $atts));

        return '<div class="wabbr-block '.$class.'">'.do_shortcode($content).'</div>';
    }

    /**
     * List group.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function listGroup($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
        ), $atts));

        $content = str_replace('<ul>', '<ul class="list-group">', $content);
        $content = str_replace('<li>', '<li class="list-group-item">', $content);

        return '<div class="wabbr-list-group '.$class.'">'.do_shortcode($content).'</div>';
    }
}
