<?php

class Wabbr_Text extends Wabbr_Shortcode
{
    /**
     * Add shortcodes.
     */
    public function add_shortcodes()
    {
        add_shortcode('hr', array(&$this, 'hr'));
        add_shortcode('lead', array(&$this, 'lead'));
        add_shortcode('clear', array(&$this, 'clear'));
    }

    /**
     * HR.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function hr($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
        ), $atts));

        return '<hr class="wabbr-hr '.$class.'" />';
    }

    /**
     * Lead.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function lead($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
        ), $atts));

        return '<p class="lead '.$class.'">'.do_shortcode($content).'</p>';
    }

    /**
     * Clear.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function clear($atts, $content = null)
    {
        return '<div class="wabbr-clear clearfix" style="clear: both;"></div>';
    }
}
