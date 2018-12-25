<?php

if (!defined('ABSPATH')) {
    exit;
}

class WabbrIframe extends WabbrShortcode
{
    /**
     * Shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('iframe', [&$this, 'iframe']);
    }

    /**
     * Iframe.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function iframe($atts, $content = null)
    {
        $atts = shortcode_atts([
            'src'           => '#',
            'width'         => '100%',
            'height'        => '480',
            'scrolling'     => 'no',
            'class'         => 'wabbr-iframe',
            'frameborder'   => '0',
        ], $atts);

        Wabbr::view('iframe', [
            'atts' => $atts,
        ]);
    }
}
