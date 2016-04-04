<?php

class Wabbr_Table extends Wabbr_Shortcode
{
    /**
     * Add shortcodes
     */
    function add_shortcodes()
    {
        add_shortcode( 'table',         array( &$this, 'table' ) );
        add_shortcode( 'table-head',    array( &$this, 'head' ) );
        add_shortcode( 'table-foot',    array( &$this, 'foot' ) );
        add_shortcode( 'table-row',     array( &$this, 'row' ) );
        add_shortcode( 'table-cell',    array( &$this, 'cell' ) );
    }

    /**
     * Table.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function table( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            'class'         => '',
            'responsive'    => true
        ), $atts ) );

        // View
        Wabbr::view('table/table', array(
            'class'      => $class,
            'responsive' => $responsive
        ));
    }

    /**
     * Table head.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function head( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            'class'     => '',
            'data'      => ''
        ), $atts ) );

        return '<thead>' . do_shortcode( $content ) . '</thead>';
    }

    /**
     * Table foot.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function foot( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            'class'     => '',
            'data'      => ''
        ), $atts ) );

        return '<tfoot>' . do_shortcode( $content ) . '</tfoot>';
    }

    /**
     * Table row.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function row( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            'class'     => '',
            'data'      => ''
        ), $atts ) );

        // Build row based on its data
        $data = $this->_build_row( $content );

        // View
        Wabbr::view('table/row', array(
            'class'      => $class,
            'responsive' => $responsive,
            'data'       => $data
        ));
    }

    /**
     * Table cell.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function cell( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            'class'     => '',
        ), $atts ) );

        return '<td class="wabbr wabbr-table-cell ' . $class . '">' . do_shortcode( $content ) . '</div>';
    }

    /**
     * Build row.
     *
     * @param  string $data
     * @return string
     */
    private function _build_row( $data )
    {
        $data = explode( ';', $data );

        return $data;
    }
}
