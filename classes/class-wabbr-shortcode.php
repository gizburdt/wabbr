<?php

class Wabbr_Shortcode
{
	function __construct()
	{
		add_action( 'init', array( &$this, 'add_shortcodes' ) );
	}
}