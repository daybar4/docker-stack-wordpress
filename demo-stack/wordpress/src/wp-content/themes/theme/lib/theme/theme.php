<?php

/**
 * Root theme file
 */

#include ACF
add_filter('acf/settings/path', 'my_acf_settings_path');
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_path($path) {
    $path = get_stylesheet_directory() . '/lib/vendor/advanced-custom-fields-pro/';

    return $path;
}

function my_acf_settings_dir($dir) {
    $dir = get_stylesheet_directory_uri() . '/lib/vendor/advanced-custom-fields-pro/';

    return $dir;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path) {
    $path = get_stylesheet_directory() . '/lib/acf-json';

    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/lib/acf-json';

    return $paths;
}

include_once(get_stylesheet_directory() . '/lib/vendor/advanced-custom-fields-pro/acf.php');
include_once(get_stylesheet_directory() . '/lib/vendor/advanced-custom-fields-nav-menu-field-master/fz-acf-nav-menu.php');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'General Settings',
        'menu_title' => 'Site Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'create_users',
        'redirect' => false
    ));

    acf_add_options_sub_page( array(
        'page_title'  => 'News featured',
        'menu_title'  => 'News featured',
        'parent_slug' => 'theme-settings',
    ) );
}


require_once('config.class.php');

if (Config::get('use_fly_images')) {
    require_once(get_stylesheet_directory() . '/lib/vendor/fly-dynamic-image-resizer/fly-dynamic-image-resizer.php');
}

require_once('scripts.php');
require_once('admin_slug.php');
require_once('revoke_user_access.php');
require_once('setup.php');
require_once('wrapper.php');
require_once('pagination.php');
require_once('nav.php');
require_once('options.class.php');
require_once('image.class.php');
//require_once( 'language.class.php' );
require_once('plugins_check.php');
require_once('gallery.php');
require_once('helpers.php');
