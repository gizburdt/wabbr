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

		return 'icon';
	}

	function flag( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'country'	=> '',
			'ratio'		=> apply_filters( 'wabbr_flag_ration', 'normal' )
		), $atts ) );

		return '<i class="flag-icon flag-icon-' . strtolower($country) . ' ' . ($ratio == 'squared' ? 'flag-icon-squared' : '') . '"></i>';
	}	
}