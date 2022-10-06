<?php
/**
 * Currently not being used as blocks were disabled in page editing form
 */

function eye_block_categories($categories, $post) {
    return array_merge(
        array(
            array(
                'slug' => 'eye',
                'title' => __('EYE', 'eye'),
                'icon' => 'wordpress',
            ),
        ),
        $categories,
    );
}

add_filter('block_categories', 'eye_block_categories', 10, 2);


add_action('acf/init', 'register_eye_blocks');
function register_eye_blocks() {

    if (function_exists('acf_register_block_type')) {

        /**
         * Hero Home block
         */
        acf_register_block_type(array(
            'name' => 'block_hero_home',
            'title' => __('Hero Home'),
            'description' => __('Hero section - homepage - clean'),
            'render_template' => 'templates/blocks/block-hero-home.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('hero', 'eye'),
            'post_types' => array('page'),
            'mode' => 'edit',
            'align' => 'full',
            //'enqueue_style' => get_template_directory_uri() . '/dist/css/theme.css',
        ));

        /**
         * Title text 2 col
         */
        acf_register_block_type(array(
            'name' => 'block_title_text_2_col',
            'title' => __('Title text 2 col'),
            'description' => __('2 columns text with title'),
            'render_template' => 'templates/blocks/block-title-text-2-col.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('2col', 'eye'),
        ));

        /**
         * Gallery slider
         */
        acf_register_block_type(array(
            'name' => 'block_gallery_slider',
            'title' => __('Gallery slider'),
            'description' => __('Gallery slider with large preview'),
            'render_template' => 'templates/blocks/block-gallery-slider.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('gallery', 'slider', 'eye'),
        ));

        /**
         * Color boxes
         */
        acf_register_block_type(array(
            'name' => 'block_color_boxes',
            'title' => __('Color boxes'),
            'description' => __('Color boxes'),
            'render_template' => 'templates/blocks/block-color-boxes.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('boxes', 'eye'),
        ));

        /**
         * Slider featured
         */
        acf_register_block_type(array(
            'name' => 'block_slider_featured',
            'title' => __('Featured slider'),
            'description' => __('Featured slider'),
            'render_template' => 'templates/blocks/block-slider-featured.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('slider', 'featured', 'eye'),
        ));

        /**
         * Breadcrumbs
         */
        acf_register_block_type(array(
            'name' => 'block_breadcrumbs',
            'title' => __('Breadcrumbs'),
            //'description' => __('Featured slider'),
            'render_template' => 'templates/blocks/block-breadcrumbs.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('breadcrumbs', 'eye'),
        ));

        /**
         * Page title
         */
        acf_register_block_type(array(
            'name' => 'block_page_title',
            'title' => __('Page title'),
            //'description' => __('Featured slider'),
            'render_template' => 'templates/blocks/block-page-title.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('title', 'eye'),
        ));

        /**
         * User text content
         */
        acf_register_block_type(array(
            'name' => 'block_user_text_content',
            'title' => __('Text content'),
            //'description' => __('Featured slider'),
            'render_template' => 'templates/blocks/block-user-content.php',
            'category' => 'eye',
            'icon' => 'admin-comments',
            'keywords' => array('user', 'text', 'content', 'eye'),
        ));

    }
}