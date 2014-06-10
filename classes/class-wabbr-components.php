<?php

class Wabbr_Components extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'list-group', 	array( &$this, 'list_group' ) );
	}

	function list_group( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<div class="list-group ' . $class . '">' . do_shortcode( $content ) . '</ul>';
	}
}