<?php

/**
 * Theme helpers
 */

/**
 * Clean up the_excerpt()
 */
function zm_excerpt_more() {
	#return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
	return '...';
}

add_filter( 'excerpt_more', 'zm_excerpt_more' );

/**
 * Returns posts from defined custom post type
 *
 * @param string $postType
 * @param int $num
 * @param string $postParent
 *
 * @return mixed
 */
function getCustomPosts( $postType = false, $num = '-1', $postParent = '' ) {
	$posts = false;

	if ( $postType && $num ) {
		$args = array(
			'post_type'        => $postType,
			'posts_per_page'   => $num,
			'post_parent'      => $postParent,
			'suppress_filters' => false
		);

		$posts = get_posts( $args );
	}

	return $posts;
}

/**
 * Return custom excerpt size from content
 *
 * @param string $content
 * @param int $size
 *
 * @return string
 */
function customExcerpt( $content = '', $size = 20, $append = '' ) {

	$customExcerpt = wp_trim_words( $content, $size, $append );

	return $customExcerpt;
}

function zm_change_search_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}
}

add_action( 'template_redirect', 'zm_change_search_url_rewrite' );

/**
 * Page titles
 */
function zm_title() {
	if ( is_home() ) {
		if ( get_option( 'page_for_posts', true ) ) {
			return get_the_title( get_option( 'page_for_posts', true ) );
		} else {
			return __( 'Latest Posts' );
		}
	} elseif ( is_archive() ) {
		return get_the_archive_title();
	} elseif ( is_search() ) {
		return sprintf( __( 'Search Results for %s' ), get_search_query() );
	} elseif ( is_404() ) {
		return __( 'Not Found' );
	} else {
		return get_the_title();
	}
}

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function zm_body_class( $classes ) {
	// Add post/page slug
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	return $classes;
}

add_filter( 'body_class', 'zm_body_class' );

function is_element_empty( $element ) {
	$element = trim( $element );

	return ! empty( $element );
}

function debugP( $debug = false ) {
	echo '<pre>';
	print_r( $debug );
	echo '</pre>';
}

/**
 * Alias for get_field
 *
 * @param $selector
 * @param bool $post_id
 * @param bool $format_value
 *
 * @return mixed|null|void
 */
function gf( $selector, $post_id = false, $format_value = true ) {
	return get_field( $selector, $post_id, $format_value );
}

/**
 * Alias for get_sub_field
 *
 * @param $selector
 * @param bool $format_value
 *
 * @return string
 */
function gsf( $selector, $format_value = true ) {
	return get_sub_field( $selector, $format_value );
}

/**
 * Alias for the_field
 *
 * @param $selector
 * @param bool $post_id
 * @param bool $format_value
 */
function tf( $selector, $post_id = false, $format_value = true ) {
	the_field( $selector, $post_id, $format_value );
}

global $page_styles;

/**
 * Add inline style that will be printed in footer
 *
 * @var string $selector An css selector
 * @var string $css The style
 */
function add_page_style( $selector, $css ) {
	global $page_styles;
	$page_styles[] = array( $selector, $css );
}

/**
 * Add inline background-image
 *
 * Helper for add_page_style() function
 *
 * @param string $selector
 * @param string $image
 * @param bool $return_class
 *
 * @return string|void
 */
function add_bg_image( $selector, $image, $return_class = false ) {
	add_page_style( '.' . $selector, 'background-image: url("' . $image . '")' );

	if ( $return_class ):
		return $selector;
	endif;
}

/**
 * Print inline styles in footer
 */
add_action( "wp_head", "print_page_styles" );

function print_page_styles() {
	global $page_styles;
	$page_styles = $page_styles ? $page_styles : array();
	if ( empty( $page_styles ) ) {
		return;
	}
	?>
    <style>
        <?php
			foreach ($page_styles as $style):
				echo "\n".$style[0] . "\n{".$style[1]."}";
			endforeach;
		?>
    </style>
	<?php
}

/**
 * Based on $fields input (field keys) will return all values
 *
 * Example: $fields = zm_fields(['field1', 'field2']);
 *
 * @param bool|array $fields
 * @param bool $includeBlank
 *
 * @return bool|array
 */
function zm_fields( $fields = false, $includeBlank = true ) {
	if ( ! is_array( $fields ) ) {
		return false;
	}

	$data = false;

	foreach ( $fields as $f ) {
		if ( get_field( $f ) ) {
			$data[ $f ] = get_field( $f );
		} elseif ( $includeBlank ) {
			$data[ $f ] = '';
		}
	}

	return $data;
}

/**
 * Vygeneruje html link na zaklade parametrov z ACF fieldtype "link"
 *
 * @param array $args
 * @param string $class
 *
 * @return bool|string
 */
function zm_link( $args = false, $class = '', $id = '' ) {
	if ( ! is_array( $args ) ) {
		return false;
	}

	$target = '';
	if ( $args['target'] && ! empty( $args['target'] ) ) {
		$target = 'target="' . $args['target'] . '"';
	}

	$id_part = '';
	if ( $id ) {
		$id_part = 'id="' . $id . '"';
	}

	$link = '<a href="' . $args['url'] . '" class="' . $class . '" title="' . strip_tags( $args['title'] ) . '" ' . $target . ' ' . $id_part . '>' . $args['title'] . '</a>';

	return $link;
}

/**
 * Parses YouTube video ID from url
 *
 * @param $url string YouTube video url
 *
 * @return bool|string Video ID if found, false otherwise
 */
function zm_youtube_id( $url ) {
	if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match ) ) {
		return $match[1];
	}

	return false;
}