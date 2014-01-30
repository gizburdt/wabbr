<?php

class Wabbr_Posts extends Wabbr_Shortcode
{
	function add_shortcodes()
	{
		add_shortcode( 'recent-posts', 		array( &$this, 'recent' ) );
		add_shortcode( 'related-posts', 	array( &$this, 'related' ) );
	}

	function recent( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'class'				=> '',
			'show_thumbnail'	=> true,
			'thumbnail_size'	=> 'medium',
			'thumbnail_class'	=> 'img-responsive',

			// get_posts variables
			'post_type' 		=> '',
			'posts_per_page'   	=> 5,
			'offset'           	=> 0,
			'category'         	=> '',
			'orderby'          	=> 'post_date',
			'order'            	=> 'DESC',
			'include'          	=> '',
			'exclude'          	=> '',
			'meta_key'         	=> '',
			'meta_value'       	=> '',
			'post_mime_type'   	=> '',
			'post_parent'      	=> '',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true
		), $atts ) );

		$posts = new WP_Query( array(
			'post_type' 		=> $post_type,
			'posts_per_page'   	=> $posts_per_page,
			'offset'           	=> $offset,
			'category'         	=> $category,
			'orderby'          	=> $orderby,
			'order'            	=> $order,
			'include'          	=> $include,
			'exclude'          	=> $exclude,
			'meta_key'         	=> $meta_key,
			'meta_value'       	=> $meta_value,
			'post_mime_type'   	=> $post_mime_type,
			'post_parent'      	=> $post_parent,
			'post_status'      	=> $post_status,
			'suppress_filters' 	=> $suppress_filters
		) );

		ob_start();

		if ( $posts->have_posts() ) 
		{
			echo '<div class="wabbr wabbr-recent-posts ' . $class . '">';
				while ( $posts->have_posts() ) : $posts->the_post();
					
					echo '<div class="' . implode( ' ', get_post_class('wabbr-post') ) . '">';
						if( $show_thumbnail )
							echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" class="wabbr-post-link">' . get_the_post_thumbnail( get_the_ID(), $thumbnail_size, array( 'class' => 'wabbr-post-img ' . $thumbnail_class ) ) . '</a>';

						echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" class="wabbr-post-link">' . get_the_title() . '</a>';
					echo '</div>';

				endwhile;
			echo '</div>';
		}

		$output = ob_get_clean(); return $output;
	}

	function related( $atts, $content = null )
	{
		global $post;

		extract( shortcode_atts( array(
			'class'				=> '',
			'show_thumbnail'	=> true,
			'thumbnail_size'	=> 'medium',
			'thumbnail_class'	=> 'img-responsive',

			// get_posts variables
			'post_type' 		=> isset( $post ) ? $post->post_type : '',
			'posts_per_page'   	=> 5,
			'offset'           	=> 0,
			'category'         	=> '',
			'orderby'          	=> 'post_date',
			'order'            	=> 'DESC',
			'include'          	=> '',
			'exclude'          	=> '',
			'meta_key'         	=> '',
			'meta_value'       	=> '',
			'post_mime_type'   	=> '',
			'post_parent'      	=> '',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true
		), $atts ) );

		$posts = new WP_Query( array(
			'post_type' 		=> $post_type,
			'posts_per_page'   	=> $posts_per_page,
			'offset'           	=> $offset,
			'category'         	=> $category,
			'orderby'          	=> $orderby,
			'order'            	=> $order,
			'include'          	=> $include,
			'exclude'          	=> $exclude,
			'meta_key'         	=> $meta_key,
			'meta_value'       	=> $meta_value,
			'post_mime_type'   	=> $post_mime_type,
			'post_parent'      	=> $post_parent,
			'post_status'      	=> $post_status,
			'suppress_filters' 	=> $suppress_filters
		) );

		ob_start();

		if ( $posts->have_posts() ) 
		{
			echo '<div class="wabbr wabbr-related-posts ' . $class . '">';
				while ( $posts->have_posts() ) : $posts->the_post();
					
					echo '<div class="' . implode( ' ', get_post_class('wabbr-post') ) . '">';
						if( $show_thumbnail )
							echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" class="wabbr-post-link">' . get_the_post_thumbnail( get_the_ID(), $thumbnail_size, array( 'class' => 'wabbr-post-img ' . $thumbnail_class ) ) . '</a>';

						echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" class="wabbr-post-link">' . get_the_title() . '</a>';
					echo '</div>';

				endwhile;
			echo '</div>';
		}

		$output = ob_get_clean(); return $output;
	}
}