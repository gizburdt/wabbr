<?php

class Wabbr_Table extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'table', 		array( &$this, 'table' ) );
		add_shortcode( 'table-head',	array( &$this, 'head' ) );
		add_shortcode( 'table-foot',	array( &$this, 'foot' ) );
		add_shortcode( 'table-row',		array( &$this, 'row' ) );
		add_shortcode( 'table-cell', 	array( &$this, 'cell' ) );
	}

	function table( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 		=> '',
			'responsive'	=> true
		), $atts ) );
		ob_start();

		if( $responsive ) echo '<div class="table-responsive wabbr-table-responsive">';
			echo '<table class="table wabbr wabbr-table ' . $class . '">' . do_shortcode( $content ) . '</table>';
		if( $responsive ) echo '</div>';

		$output = ob_get_clean(); return $output;
	}

	function head( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'data'		=> ''
		), $atts ) );
		
		return '<thead>' . do_shortcode( $content ) . '</thead>';
	}

	function foot( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'data'		=> ''
		), $atts ) );
		
		return '<tfoot>' . do_shortcode( $content ) . '</tfoot>';
	}

	function row( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
			'data'		=> ''
		), $atts ) );
		ob_start();

		// Build row based on its data
		$data 	= $this->_build_row( $content );

		echo '<tr class="wabbr wabbr-table-row ' . $class . '">';
			foreach( $data as $cell ) :
				echo do_shortcode('[table-cell]' . $cell . '[/table-cell]');
			endforeach;
		echo '</tr>';

		$output = ob_get_clean(); return $output;
	}

	function cell( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class' 	=> '',
		), $atts ) );

		return '<td class="wabbr wabbr-table-cell ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

	private function _build_row( $data )
	{
		$data = explode( ';', $data );

		return $data;
	}
}