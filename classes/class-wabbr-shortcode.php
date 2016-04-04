<?php

class Wabbr_Shortcode
{
    /**
     * Constructor.
     */
    function __construct()
    {
        add_action( 'init', array( &$this, 'add_shortcodes' ) );
    }
}
