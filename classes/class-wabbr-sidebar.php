<?php

class Wabbr_Sidebar extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'sidebar', 		array( &$this, 'sidebar' ) );
	}
}