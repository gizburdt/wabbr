<?php

if (!defined('ABSPATH')) {
    exit;
}

class WabbrText extends WabbrShortcode
{
    /**
     * Add shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('hr', [&$this, 'hr']);
        add_shortcode('lead', [&$this, 'lead']);
        add_shortcode('clear', [&$this, 'clear']);
    }

    /**
     * HR.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function hr($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
        ], $atts));

        return '<hr class="wabbr-hr '.$class.'" />';
    }

    /**
     * Lead.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function lead($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
        ], $atts));

        return '<p class="lead '.$class.'">'.do_shortcode($content).'</p>';
    }

    /**
     * Clear.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function clear($atts, $content = null)
    {
        return '<div class="wabbr-clear clearfix" style="clear: both;"></div>';
    }
}
