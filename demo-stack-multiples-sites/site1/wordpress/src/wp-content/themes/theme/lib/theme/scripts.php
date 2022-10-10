<?php

/**
 * Initialise theme scrips
 */
function zm_scripts() {

    # Register jQuery CDN
    if (!is_admin() && current_theme_supports('jquery-cdn') && Config::get_script('jquery')) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', Config::get_script('jquery'), array(), null, false);
        add_filter( 'script_loader_src', 'zm_jquery_local_fallback', 10, 2 );
    }

    # Register jQuery Local
    if (!is_admin() && current_theme_supports('jquery-local') && Config::get_script('jquery_local')) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . Config::get_script('jquery_local'), array(), null, false);
    }

    # Load jQuery
    wp_enqueue_script('jquery');

    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');

    # Comments reply script
    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    # Scripts integration - css
    $styles = Config::get_scripts('css');
    if (is_array($styles)) {
        foreach ($styles as $name => $path) {
            wp_enqueue_style(Config::get('prefix') . '_' . $name, get_template_directory_uri() . $path, false, null);
        }
    }

    # Scripts integration - js
    $scripts = Config::get_scripts('js');
    if (is_array($scripts)) {
        foreach ($scripts as $name => $path) {
            wp_enqueue_script(Config::get('prefix') . '_' . $name, get_template_directory_uri() . $path, array(), null, true);
        }
    }
}

add_action('wp_enqueue_scripts', 'zm_scripts', 100);

/**
 * Add editor styles to TinyMCE
 */
function zm_theme_add_editor_styles() {

    $editorStyles = Config::get_scripts('editor_styles');
    if (!$editorStyles || !is_array($editorStyles)) {
        return;
    }

    foreach ($editorStyles as $style) {
        add_editor_style(get_template_directory_uri() . $style);
    }

}

add_action('admin_init', 'zm_theme_add_editor_styles');
