<?php

class Wabbr_Sidebar extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'sidebar', 		array( &$this, 'sidebar' ) );
	}

	function sidebar( $atts, $content = null )
	{
		extract( shortcode_atts( array(
      		'name' 		=> '',
      		'class'		=> ''
      	), $atts ) );
      	ob_start();

      	echo '<div class="dynamic-sidebar wabbr-sidebar ' . $class . '">';
      		echo '<ul>';
      			dynamic_sidebar( $name );
      		echo '</ul>';
      	echo '</div>';
      	
      	$output = ob_get_clean(); return $output;
	}
}