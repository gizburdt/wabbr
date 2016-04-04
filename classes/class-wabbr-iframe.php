<?php

class Wabbr_Iframe extends Wabbr_Shortcode
{
    /**
     * Shortcodes.
     */
    public function add_shortcodes()
    {
        add_shortcode('iframe', array(&$this, 'iframe'));
    }

    /**
     * Iframe.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function iframe($atts, $content = null)
    {
        $atts = shortcode_atts(array(
            'src'           => '#',
            'width'         => '100%',
            'height'        => '480',
            'scrolling'     => 'no',
            'class'         => 'wabbr-iframe',
            'frameborder'   => '0'
        ), $atts);

        Wabbr::view('iframe', array(
            'atts' => $atts,
        ));
    }
}
