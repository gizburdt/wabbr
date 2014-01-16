<?php

class Wabbr_Button extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'button', 	array( &$this, 'button' ) );
	}

	function button( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> 'btn',
			'link'		=> '#',
			'target'	=> ''
		), $atts ) );

		return '<a class="wabbr-btn ' . $class . '" href="' . $link . '" target="' . $target . '">' . do_shortcode( $content ) . '</a>';
	}
}