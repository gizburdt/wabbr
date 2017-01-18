<?php

if (! defined('ABSPATH')) {
    exit;
}

class WabbrTable extends WabbrShortcode
{
    /**
     * Add shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('table', array(&$this, 'table'));
        add_shortcode('table-head', array(&$this, 'head'));
        add_shortcode('table-foot', array(&$this, 'foot'));
        add_shortcode('table-row', array(&$this, 'row'));
        add_shortcode('table-cell', array(&$this, 'cell'));
    }

    /**
     * Table.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function table($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'      => '',
            'responsive' => true
        ), $atts));

        // View
        Wabbr::view('table/table', array(
            'class'      => $class,
            'content'    => $content,
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
    public function head($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'data'      => ''
        ), $atts));

        return '<thead>'.do_shortcode($content).'</thead>';
    }

    /**
     * Table foot.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function foot($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'data'      => ''
        ), $atts));

        return '<tfoot>'.do_shortcode($content).'</tfoot>';
    }

    /**
     * Table row.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function row($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
            'data'      => ''
        ), $atts));

        // Build row based on its data
        $data = $this->_buildRow($content);

        // View
        Wabbr::view('table/row', array(
            'class'      => $class,
            'content'    => $content,
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
    public function cell($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'class'     => '',
        ), $atts));

        return '<td class="wabbr wabbr-table-cell '.$class.'">'.do_shortcode($content).'</div>';
    }

    /**
     * Build row.
     *
     * @param  string $data
     * @return string
     */
    private function _buildRow($data)
    {
        $data = explode(';', $data);

        return $data;
    }
}
