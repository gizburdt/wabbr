<?php

class Wabbr_Gmaps extends Wabbr_Shortcode
{
	function __construct()
	{
		parent::__construct();
		
		add_action( 'wp_head', array( &$this, 'wp_head' ) );
	}

	function wp_head()
	{
		global $post;
		
		if( isset( $post ) && isset( $post->post_content ) && has_shortcode( $post->post_content, 'gmaps' ) )
		{
			?><script type="text/javascript">
				function initialize() {
					var mapOptions = {
						center: new google.maps.LatLng(-34.397, 150.644),
						zoom: 8
					};
					var map = new google.maps.Map(document.getElementById("map-canvas"),
						mapOptions);
				}
	      		google.maps.event.addDomListener(window, "load", initialize);
	      	</script><?php
	    }
	}

	function add_shortcodes()
	{
		add_shortcode( 'gmaps', 	array( &$this, 'gmaps' ) );
	}

	function gmaps( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'key'		=> '',
			'class' 	=> '',
		), $atts ) );

		ob_start();

      	echo '<div id="map-canvas"/>';

    	$output = ob_get_clean(); return $output;
	}
}