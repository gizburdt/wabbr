<?php

class Wabbr_Text extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'hr', 	array( &$this, 'hr' ) );
		add_shortcode( 'lead', 	array( &$this, 'lead' ) );
		add_shortcode( 'clear', array( &$this, 'clear' ) );
	}

	function hr( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<hr class="wabbr-hr ' . $class . '" />';
	}

	function lead( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<p class="lead ' . $class . '">' . do_shortcode( $content ) . '</p>';
	}


	function clear( $atts, $content = null )
	{
		return '<div class="wabbr-clear clearfix" style="clear: both;"></div>';
	}
}