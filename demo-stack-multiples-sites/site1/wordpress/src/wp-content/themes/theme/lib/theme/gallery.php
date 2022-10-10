<?php

/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * The number of columns must be a factor of 12.
 *
 * @link http://getbootstrap.com/components/#thumbnails
 */
function zm_gallery( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance ++;

	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters( 'post_gallery', '', $attr );

	if ( $output != '' ) {
		return $output;
	}

	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	extract( shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => '',
		'icontag'    => '',
		'captiontag' => '',
		'columns'    => 4,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr ) );

	$id = intval( $post->ID );

	$order = 'ASC';
	if ( $order === 'RAND' ) {
		$orderby = 'none';
	}

	if ( ! empty( $include ) ) {
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
	} elseif ( ! empty( $exclude ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	$output = '<div class="gallery"><div class="gallery__row">';

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$imgThumb = Images::get( $id, 'gallery' );
		$imgFull  = Images::get( $id, 'full' );
		$output .= '<div class="gallery__item">';
		$output .= '<a href="' . $imgFull . '" rel="lightbox"><div class="gallery__item__img" style="background-image: url(' . $imgThumb . ')"></div>';
		$output .= '</a>';
		$output .= '</div>';
		$i ++;
	}

	$output .= '</div></div>';

	return $output;
}

remove_shortcode( 'gallery' );
add_shortcode( 'gallery', 'zm_gallery' );
add_filter( 'use_default_gallery_style', '__return_null' );

/**
 * Add class="thumbnail img-thumbnail" to attachment items
 */
function roots_attachment_link_class( $html ) {
	$html = str_replace( '<a', '<a class="thumbnail img-thumbnail"', $html );

	return $html;
}

add_filter( 'wp_get_attachment_link', 'roots_attachment_link_class', 10, 1 );
