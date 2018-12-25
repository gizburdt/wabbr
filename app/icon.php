<?php

if (!defined('ABSPATH')) {
    exit;
}

class WabbrIcon extends WabbrShortcode
{
    /**
     * Shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('icon', [&$this, 'icon']);
        add_shortcode('flag', [&$this, 'flag']);
    }

    /**
     * Icon.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function icon($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
        ], $atts));

        return '<i class="wabbr-icon icon '.$class.'"></i>';
    }

    /**
     * Flag.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function flag($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'   => '',
            'country' => '',
            'ratio'   => apply_filters('wabbr_flag_ratio', 'normal'),
        ], $atts));

        $country = 'flag-icon-'.strtolower($country);
        $ratio = $ratio == 'squared' ? 'flag-icon-squared' : '';

        return '<i class="wabbr-flag flag-icon '.$country.' '.$ratio.' '.$class.'"></i>';
    }
}
