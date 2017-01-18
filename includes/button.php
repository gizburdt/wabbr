<?php

if (! defined('ABSPATH')) {
    exit;
}

class WabbrButton extends WabbrShortcode
{
    /**
     * Shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('button', array(&$this, 'button'));
        add_shortcode('button-primary', array(&$this, 'buttonPrimary'));
        add_shortcode('button-secondary', array(&$this, 'buttonSecondary'));
        add_shortcode('button-tertiary', array(&$this, 'buttonTertiary'));
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
    public function buttonPrimary($atts, $content = null)
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
    public function buttonSecondary($atts, $content = null)
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
    public function buttonTertiary($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'link'      => '#',
            'target'    => ''
        ), $atts));

        return do_shortcode('[button class="btn-tertiary '.$class.'" link="'.$link.'" target="'.$target.'"]'.$content.'[/button]');
    }
}
