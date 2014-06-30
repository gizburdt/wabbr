<?php

class Wabbr_Iframe extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'iframe', 	array( &$this, 'iframe' ) );
	}

	function iframe( $atts, $content = null )
	{
		$atts = shortcode_atts( array(
			'src' 			=> '#',
			'width' 		=> '100%',
			'height' 		=> '480',
			'scrolling' 	=> 'no',
			'class' 		=> 'wabbr-iframe',
			'frameborder' 	=> '0'
		), $atts );

		ob_start(); ?>

		<iframe
			src="<?php echo $atts['src']; ?>"
			width="<?php echo $atts['width']; ?>"
			height="<?php echo $atts['height']; ?>"
			scrolling="<?php echo $atts['scrolling']; ?>"
			class="<?php echo $atts['class']; ?>"
			frameborder="<?php echo $atts['frameborder']; ?>">
		</iframe>

		<?php $output = ob_get_clean(); return $output;
	}
}