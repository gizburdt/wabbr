<?php

if (! defined('ABSPATH')) {
    exit;
}

class Wabbr_Button extends Wabbr_Shortcode
{
    /**
     * Shortcodes.
     */
    public function add_shortcodes()
    {
        add_shortcode('button', array(&$this, 'button'));
        add_shortcode('button-primary', array(&$this, 'button_primary'));
        add_shortcode('button-secondary', array(&$this, 'button_secondary'));
        add_shortcode('button-tertiary', array(&$this, 'button_tertiary'));
    }

    /**
     * Button.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function button($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'link'      => '#',
            'target'    => '',
            'title'     => '',
            'disabled'  => false
        ), $atts));

        return '<a class="wabbr-btn btn '.$class.'" href="'.$link.'" target="'.$target.'" title="'.$title.'" '.($disabled ? 'disabled="disabled"' : '').'>'.do_shortcode($content).'</a>';
    }

    /**
     * Button (primary).
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function button_primary($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'link'      => '#',
            'target'    => ''
        ), $atts));

        return do_shortcode('[button class="btn-primary '.$class.'" link="'.$link.'" target="'.$target.'"]'.$content.'[/button]');
    }

    /**
     * Button (secondary).
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function button_secondary($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'link'      => '#',
            'target'    => ''
        ), $atts));

        return do_shortcode('[button class="btn-secondary '.$class.'" link="'.$link.'" target="'.$target.'"]'.$content.'[/button]');
    }

    /**
     * Button (tertiary).
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function button_tertiary($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'link'      => '#',
            'target'    => ''
        ), $atts));

        return do_shortcode('[button class="btn-tertiary '.$class.'" link="'.$link.'" target="'.$target.'"]'.$content.'[/button]');
    }
}
