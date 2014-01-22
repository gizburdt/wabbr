<?php

class Wabbr_Menu extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'menu', 			array( &$this, 'menu' ) );
		add_shortcode( 'submenu',		array( &$this, 'submenu' ) );
	}

	function menu( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'theme_location'  	=> '',
			'menu'            	=> '',
			'container'       	=> 'div',
			'container_class' 	=> 'wabbr-menu',
			'container_id'    	=> '',
			'menu_class'      	=> 'menu',
			'menu_id'         	=> '',
			'echo'            	=> true,
			'fallback_cb'     	=> 'wp_page_menu',
			'before'          	=> '',
			'after'           	=> '',
			'link_before'     	=> '',
			'link_after'      	=> '',
			'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           	=> 0,
			'walker'          	=> ''
		), $atts ) );

		$walker = ! empty( $walker ) ? new $walker : '';

		return wp_nav_menu( array(
			'theme_location'  	=> $theme_location,
			'menu'            	=> $menu,
			'container'       	=> $container,
			'container_class' 	=> $container_class,
			'container_id'    	=> $container_id,
			'menu_class'      	=> $menu_class,
			'menu_id'         	=> $menu_id,
			'echo'            	=> $echo,
			'fallback_cb'     	=> $fallback_cb,
			'before'          	=> $before,
			'after'           	=> $after,
			'link_before'     	=> $link_before,
			'link_after'      	=> $link_after,
			'items_wrap'      	=> $items_wrap,
			'depth'           	=> $depth,
			'walker'          	=> $walker
		) );
	}

	function submenu( $atts, $content = null )
	{
		global $post;

		$post = is_object( $post ) ? $post->ID : $post;

		extract( shortcode_atts( array(
			'authors'     		=> '',
			'child_of'    		=> $post->ID,
			'date_format' 		=> get_option('date_format'),
			'depth'       		=> 0,
			'echo'        		=> 1,
			'exclude'     		=> '',
			'include'     		=> '',
			'link_after'  		=> '',
			'link_before' 		=> '',
			'post_type'   		=> 'page',
			'post_status' 		=> 'publish',
			'show_date'   		=> '',
			'sort_column' 		=> 'menu_order, post_title',
			'title_li'    		=> __('Pages'), 
			'walker'      		=> ''
		), $atts ) );

		$walker = ! empty( $walker ) ? new $walker : '';

		return wp_nav_menu( array(
			'authors'     		=> $authors,
			'child_of'    		=> $child_of,
			'date_format' 		=> $date_format,
			'depth'       		=> $depth,
			'echo'        		=> $echo,
			'exclude'     		=> $exclude,
			'include'     		=> $include,
			'link_after'  		=> $link_after,
			'link_before' 		=> $link_before,
			'post_type'   		=> $post_type,
			'post_status' 		=> $post_status,
			'show_date'   		=> $show_date,
			'sort_column' 		=> $sort_column,
			'title_li'    		=> $title_li,
			'walker'      		=> $walker,
		) );
	}
}