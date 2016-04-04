<?php

class Wabbr_Posts extends Wabbr_Shortcode
{
    /**
     * Add shortcodes.
     */
    function add_shortcodes()
    {
        add_shortcode( 'recent-posts',  array( &$this, 'recent' ) );
        add_shortcode( 'related-posts', array( &$this, 'related' ) );
    }

    /**
     * Recent posts.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function recent( $atts, $content = null )
    {
        extract( shortcode_atts( array(
            'class'             => '',
            'show_thumbnail'    => true,
            'thumbnail_size'    => 'medium',
            'thumbnail_class'   => 'img-responsive',

            // get_posts variables
            'post_type'         => '',
            'posts_per_page'    => 5,
            'offset'            => 0,
            'category'          => '',
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'include'           => '',
            'exclude'           => '',
            'meta_key'          => '',
            'meta_value'        => '',
            'post_mime_type'    => '',
            'post_parent'       => '',
            'post_status'       => 'publish',
            'suppress_filters'  => true
        ), $atts ) );

        $posts = new WP_Query( array(
            'post_type'         => $post_type,
            'posts_per_page'    => $posts_per_page,
            'offset'            => $offset,
            'category'          => $category,
            'orderby'           => $orderby,
            'order'             => $order,
            'include'           => $include,
            'exclude'           => $exclude,
            'meta_key'          => $meta_key,
            'meta_value'        => $meta_value,
            'post_mime_type'    => $post_mime_type,
            'post_parent'       => $post_parent,
            'post_status'       => $post_status,
            'suppress_filters'  => $suppress_filters
        ) );

        Wabbr::view('posts/recent', array(
            'class'           => $class,
            'show_thumbnail'  => $show_thumbnail,
            'thumbnail_size'  => $thumbnail_size,
            'thumbnail_class' => $thumbnail_class,
            'posts'           => $posts
        ));
    }

    /**
     * Related posts.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    function related( $atts, $content = null )
    {
        global $post;

        extract( shortcode_atts( array(
            'class'             => '',
            'show_thumbnail'    => true,
            'thumbnail_size'    => 'medium',
            'thumbnail_class'   => 'img-responsive',

            // get_posts variables
            'post_type'         => isset( $post ) ? $post->post_type : '',
            'posts_per_page'    => 5,
            'offset'            => 0,
            'category'          => '',
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'include'           => '',
            'exclude'           => '',
            'meta_key'          => '',
            'meta_value'        => '',
            'post_mime_type'    => '',
            'post_parent'       => '',
            'post_status'       => 'publish',
            'suppress_filters'  => true
        ), $atts ) );

        $posts = new WP_Query( array(
            'post_type'         => $post_type,
            'posts_per_page'    => $posts_per_page,
            'offset'            => $offset,
            'category'          => $category,
            'orderby'           => $orderby,
            'order'             => $order,
            'include'           => $include,
            'exclude'           => $exclude,
            'meta_key'          => $meta_key,
            'meta_value'        => $meta_value,
            'post_mime_type'    => $post_mime_type,
            'post_parent'       => $post_parent,
            'post_status'       => $post_status,
            'suppress_filters'  => $suppress_filters
        ) );

        Wabbr::view('posts/recent', array(
            'class'           => $class,
            'show_thumbnail'  => $show_thumbnail,
            'thumbnail_size'  => $thumbnail_size,
            'thumbnail_class' => $thumbnail_class,
            'posts'           => $posts
        ));
    }
}
