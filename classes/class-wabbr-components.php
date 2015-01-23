<?php

class Wabbr_Components extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'block', 		array( &$this, 'block' ) );
		add_shortcode( 'list-group', 	array( &$this, 'list_group' ) );
	}

	function block( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<div class="wabbr block ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

	function list_group( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		$content = str_replace( '<ul>', '<ul class="list-group">', $content );
		$content = str_replace( '<li>', '<li class="list-group-item">', $content );

		return '<div class="wabbr-list-group ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}
}