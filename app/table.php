<?php

if (!defined('ABSPATH')) {
    exit;
}

class WabbrTable extends WabbrShortcode
{
    /**
     * Add shortcodes.
     */
    public function addShortcodes()
    {
        add_shortcode('table', [&$this, 'table']);
        add_shortcode('table-head', [&$this, 'head']);
        add_shortcode('table-foot', [&$this, 'foot']);
        add_shortcode('table-row', [&$this, 'row']);
        add_shortcode('table-cell', [&$this, 'cell']);
    }

    /**
     * Table.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function table($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'      => '',
            'responsive' => true,
        ], $atts));

        // View
        Wabbr::view('table/table', [
            'class'      => $class,
            'content'    => $content,
            'responsive' => $responsive,
        ]);
    }

    /**
     * Table head.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function head($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
            'data'      => '',
        ], $atts));

        return '<thead>'.do_shortcode($content).'</thead>';
    }

    /**
     * Table foot.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function foot($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
            'data'      => '',
        ], $atts));

        return '<tfoot>'.do_shortcode($content).'</tfoot>';
    }

    /**
     * Table row.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function row($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
            'data'      => '',
        ], $atts));

        // Build row based on its data
        $data = $this->_buildRow($content);

        // View
        Wabbr::view('table/row', [
            'class'      => $class,
            'content'    => $content,
            'responsive' => $responsive,
            'data'       => $data,
        ]);
    }

    /**
     * Table cell.
     *
     * @param array  $atts
     * @param string $content
     *
     * @return string
     */
    public function cell($atts, $content = null)
    {
        extract(shortcode_atts([
            'class'     => '',
        ], $atts));

        return '<td class="wabbr wabbr-table-cell '.$class.'">'.do_shortcode($content).'</div>';
    }

    /**
     * Build row.
     *
     * @param string $data
     *
     * @return string
     */
    private function _buildRow($data)
    {
        $data = explode(';', $data);

        return $data;
    }
}
