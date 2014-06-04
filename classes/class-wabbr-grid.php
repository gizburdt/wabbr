<?php

class Wabbr_Grid extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'container', 	array( &$this, 'container' ) );
		add_shortcode( 'row', 			array( &$this, 'row' ) );
		add_shortcode( 'col', 			array( &$this, 'col' ) );

		// Fix nested shortcodes
		add_shortcode( 'child-row',		array( &$this, 'row' ) );
		add_shortcode( 'child-col',		array( &$this, 'col' ) );
	}

	function container( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<div class="container wabbr wabbr-container ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

	function row( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<div class="row wabbr wabbr-row ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

	function col( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'size' 		=> '',
			'class'		=> ''
		), $atts ) );

		// Convert numeric classes
		$size 	= $this->_convert_sizes( $size );

		// Output
		return '<div class="wabbr-col ' . $size . ' ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

	private function _convert_sizes( $size )
	{
		$sizes 		= explode( ' ', $size );
		$classes 	= array();

		foreach( $sizes as $size )
		{
			if( preg_match( '/^[0-9]{1,2}\/[0-9]{1,2}$/', $size ) )
			{
				switch( $size ) :
					case '1/2' : case '2/4' : case '3/6' : case '4/8' : case '5/10' : case '6/12' :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-6', 'col-lg-6' ) ); break;
					case '1/3' : case '2/6' : case '3/9' : case '4/12' :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-4', 'col-lg-4' ) ); break;
					case '1/4' : case '2/8' : case '3/12' :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-3', 'col-lg-3' ) ); break;
					case '1/6' : case '2/12' :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-2', 'col-lg-2' ) ); break;
					case '2/3' : case '4/6' : case '8/12' :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-8', 'col-lg-8' ) ); break;
					case '3/4' : case '6/8' : case '9/12' :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-9', 'col-lg-9' ) ); break;
					default :
						$classes = array_merge( $classes, array( 'col-xs-12', 'col-sm-12', 'col-md-12', 'col-lg-12' ) ); break;
				endswitch;
			}
			else
			{
				$classes[] = $size;
			}
		}

		$class = apply_filters( 'wabbr_col_class', $classes, $size );
		$class = is_array( $class ) ? implode( ' ', $class ) : $class;

		return $class;
	}
}