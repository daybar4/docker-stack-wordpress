<?php

/**
 * Root project file
 */

if (function_exists('icl_object_id')) {
    define('HOME_ID', icl_object_id(get_option('page_on_front'), 'page', true, ICL_LANGUAGE_CODE));
    define('BLOG_ID', icl_object_id(get_option('page_for_posts'), 'page', true, ICL_LANGUAGE_CODE));
} else {
    define('HOME_ID', get_option('page_on_front'));
    define('BLOG_ID', get_option('page_for_posts'));
}

/**
 * Blocks
 */

//require_once 'blocks/blocks.php';

/**
 * Options validator
 */
require_once 'options_validator.php';

/**
 * Populate bg_color fields
 */

/**
 * blue - blue light
 * blue3 - blue dark
 * yellow
 * green - green light
 * green2 - green lime
 * purple
 * red
 * pink
 * white
 */

$bg_color_classes = array(
    'bg_blue' => 'blue light',
    'bg_blue3' => 'blue dark',
    'bg_yellow' => 'yellow',
    'bg_pink' => 'saffron',
    'bg_green' => 'green light',
    'bg_green2' => 'green lime',
    'bg_purple' => 'purple',
    'bg_red' => 'red',
    'bg_white' => 'white',
    'bg_lgrey2' => 'light grey',
    'bg_transparent' => 'transparent',
);

add_filter('acf/prepare_field/key=field_5fd9e2bce3114', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fdf5b070922b', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe2055293150', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe2072f63577', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe20c26bf715', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe20f3889a0f', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe30058cd087', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe313069eadf', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe3578a9a994', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe99ea3cf50d', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fe9aa4c6d1b6', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fec75825aa84', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fec7807412df', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fec975f7e99d', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_5fec9850f39ee', 'eye_populate_bg_color_classes');
add_filter('acf/prepare_field/key=field_603761c879414', 'eye_populate_bg_color_classes');

function eye_populate_bg_color_classes($field) {

    global $bg_color_classes;
    $field['choices'] = false;
    foreach ($bg_color_classes as $key => $b) {
        $field['choices'][trim($key)] = trim($b);
    }

    return $field;
}

function eye_disable_editor($id = false) {

    $excluded_templates = array(
        'templates/template-pagebuilder.php',
    );

    $excluded_ids = array(// get_option( 'page_on_front' )
    );

    if (empty($id)) {
        return false;
    }

    $id = intval($id);
    $template = get_page_template_slug($id);

    return in_array($id, $excluded_ids) || in_array($template, $excluded_templates);
}

/**
 * Disable Gutenberg by template
 */
function eye_disable_gutenberg($can_edit, $post_type) {

    if (!(is_admin() && !empty($_GET['post']))) {
        return $can_edit;
    }

    if (eye_disable_editor($_GET['post'])) {
        $can_edit = false;
    }

    return $can_edit;
}

add_filter('gutenberg_can_edit_post_type', 'eye_disable_gutenberg', 10, 2);
add_filter('use_block_editor_for_post_type', 'eye_disable_gutenberg', 10, 2);

/**
 * Pagebuilder controller
 */

function do_eye_pagebuilder($pagebuilder = false) {
    if (!$pagebuilder) {
        $pagebuilder = get_field('pagebuilder');
    }

    if (!$pagebuilder) {
        return false;
    }

    foreach ($pagebuilder as $x) {
        switch ($x['acf_fc_layout']) {
            case 'breadcrumbs':
                include get_template_directory() . '/templates/builder/breadcrumbs.php';
                break;

            case 'gallery_slider':
                include get_template_directory() . '/templates/builder/gallery-slider.php';
                break;

            case 'page_title':
                include get_template_directory() . '/templates/builder/page-title.php';
                break;

            case 'text_content':
                include get_template_directory() . '/templates/builder/text-content.php';
                break;

            case 'slider_featured':
                include get_template_directory() . '/templates/builder/slider-featured.php';
                break;

            case 'title_with_2_text_columns':
                include get_template_directory() . '/templates/builder/title-text-2-col.php';
                break;

            case 'color_boxes':
                include get_template_directory() . '/templates/builder/color_boxes.php';
                break;

            case 'hero_block':
                include get_template_directory() . '/templates/builder/hero_block.php';
                break;

            case 'video_embed':
                include get_template_directory() . '/templates/builder/video_embed.php';
                break;

            case 'faq':
                include get_template_directory() . '/templates/builder/faq.php';
                break;

            case 'practical_details':
                include get_template_directory() . '/templates/builder/practical_details.php';
                break;

            case 'textblock_with_colored_title':
                include get_template_directory() . '/templates/builder/textblock_with_colored_title.php';
                break;

            case 'wide_banners_with_cta':
                include get_template_directory() . '/templates/builder/wide_banners_with_cta.php';
                break;

            case 'icon_cards':
                include get_template_directory() . '/templates/builder/icon_cards.php';
                break;

            case 'partners':
                include get_template_directory() . '/templates/builder/partners.php';
                break;

            case 'tabs':
                include get_template_directory() . '/templates/builder/tabs.php';
                break;

        }
    }
}

function wp_get_menu_array($current_menu = 'Main Menu') {

    $menu_array = wp_get_nav_menu_items($current_menu);
    $menu = array();

    //debugP($menu_array);

    function populate_children($menu_array, $menu_item) {
        $children = array();
        if (!empty($menu_array)) {
            foreach ($menu_array as $k => $m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $tmp = array();
                    $tmp['ID'] = $m->ID;
                    $tmp['title'] = $m->title;

                    $url = $m->url;
                    if ($url == '#') {
                        $url = 'javascript:void(0)';
                    }
                    $tmp['url'] = $url;

                    $tmp['current'] = $m->current;
                    unset($menu_array[$k]);
                    $tmp['children'] = populate_children($menu_array, $m);

                    $children[] = $tmp;
                }
            }
        };
        return $children;
    }

    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $tmp = array();
            $tmp['ID'] = $m->ID;
            $tmp['title'] = $m->title;

            $url = $m->url;
            if ($url == '#') {
                $url = 'javascript:void(0)';
            }
            $tmp['url'] = $url;

            $current = false;
            if ($m->current || $m->current_item_parent || $m->current_item_ancestor) {
                $current = true;
            }

            $tmp['current'] = $current;
            $tmp['children'] = populate_children($menu_array, $m);

            $menu[] = $tmp;
        }
    }

    return $menu;
}

add_filter('wp_get_nav_menu_items', 'prefix_nav_menu_classes', 10, 3);

function prefix_nav_menu_classes($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);
    return $items;
}

add_filter('allowed_block_types', 'eye_allowed_block_types');

function eye_allowed_block_types($allowed_blocks) {
    return array(
        'core/image',
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/quote',
        'core/video',
        'core/table',
        'core/embed',
    );
}

function get_current_locale() {

    $locale = ICL_LANGUAGE_CODE;

    return $locale;
    $languages = apply_filters('wpml_active_languages', NULL);

    foreach ($languages as $l) {
        if ($l['active']) {
            $locale = $l['default_locale'];
            break;
        }
    }

    return str_replace('_', '-', $locale);
}

function strip_comments_callback($buffer) {
	$buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);
	return $buffer;
}

function buffer_start() {
	ob_start('strip_comments_callback');
}

function buffer_end() {
	ob_end_flush();
}

add_action('custom_before_header', 'buffer_start');
add_action('wp_footer', 'buffer_end');