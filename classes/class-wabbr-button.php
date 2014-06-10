<?php

class Wabbr_Button extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'button', 			array( &$this, 'button' ) );
		add_shortcode( 'button-primary', 	array( &$this, 'button_primary' ) );
		add_shortcode( 'button-secondary', 	array( &$this, 'button_secondary' ) );
		add_shortcode( 'button-tertiary', 	array( &$this, 'button_tertiary' ) );
	}

	function button( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'link'		=> '#',
			'target'	=> ''
		), $atts ) );

		return '<a class="wabbr-btn btn ' . $class . '" href="' . $link . '" target="' . $target . '">' . do_shortcode( $content ) . '</a>';
	}

	function button_primary( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'link'		=> '#',
			'target'	=> ''
		), $atts ) );

		return do_shortcode( '[button class="btn-primary ' . $class . '" link="' . $link . '" target="' . $target . '"]' . $content . '[/button]' );
	}

	function button_secondary( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'link'		=> '#',
			'target'	=> ''
		), $atts ) );

		return do_shortcode( '[button class="btn-secondary ' . $class . '" link="' . $link . '" target="' . $target . '"]' . $content . '[/button]' );
	}

	function button_tertiary( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'link'		=> '#',
			'target'	=> ''
		), $atts ) );

		return do_shortcode( '[button class="btn-tertiary ' . $class . '" link="' . $link . '" target="' . $target . '"]' . $content . '[/button]' );
	}
}