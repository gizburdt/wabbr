<?php

class Wabbr_Icon extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'icon', 	array( &$this, 'icon' ) );
		add_shortcode( 'flag', 	array( &$this, 'flag' ) );
	}

	function icon( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<i class="wabbr-icon icon"></i>';
	}

	function flag( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'country'	=> '',
			'ratio'		=> apply_filters( 'wabbr_flag_ratio', 'normal' )
		), $atts ) );

		$country 	= 'flag-icon-' . strtolower( $country );
		$ratio 		= $ratio == 'squared' ? 'flag-icon-squared' : '';

		return '<i class="wabbr-flag flag-icon ' . $country . ' ' . $ratio . '"></i>';
	}	
}