<?php

class Wabbr_Text extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'lead', 		array( &$this, 'lead' ) );
	}

	function lead( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<p class="lead ' . $class . '">' . do_shortcode( $content ) . '</p>';
	}
}