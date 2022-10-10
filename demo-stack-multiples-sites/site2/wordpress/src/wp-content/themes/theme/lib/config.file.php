<?php
/**
 * Theme config file
 */

# Domain name or website project name used for translations
define('ZM_D', 'eye');

$themeConfig = array(
    # Theme prefix
    'prefix' => ZM_D,

    # Custom admin slug (don´t forget to flush rewrite rules)
    # 'admin_slug' => 'administracia',

    # Revoke user access to certain things
    'revoke_user_access' => array(/*array(
			'user_id' => array(1),
			'plugin_listing' => array('akismet', 'hello.php'),
			'menu_slugs' => array(
				'akismet-key-config',
				'fly-images',
				'edit.php?post_type=acf-field-group'
			)
		),*/
    ),

    # Images sizes
    # Example: 'large' => array( 'large', '700', '400', true )
    'image_sizes' => array(
        'small_square' => array('small_square', 135, 135, true),
        'partner' => array('partner', 360, 360, true),
        'video_poster' => array('video_poster', 1280, 720, true),
        'thumbnail_gallery' => array('thumbnail_gallery', 135, 75, true),
        'thumb' => array('thumb', 400, 250, true),
        'wide_banner' => array('wide_banner', 768, 350, true),
    ),

# Custom login logo (use relative path to theme directory)
    'custom_login_logo' => '/dist/img/euro_logo.png',

    # Navigation menu locations
    'nav_menus' => array(
        'primary_navigation' => 'Primary Navigation',
        'footer_navigation' => 'Footer Bottom Navigation',
    ),
);

$themeScripts = array(
    # Fill in css style URLs
    'css' => array(
        'theme' => '/dist/css/theme.css',
    ),

    # Fill in javascript URLs
    'js' => array(
        'vendor' => '/dist/js/vendor.min.js',
        'app' => '/dist/js/theme.min.js',
    ),

    # Fill in DNS prefetch values
    /*
    'dns_prefetch' => array(
        '//ajax.googleapis.com',
    ),
    */

    # jQuery CDN
    //'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js',

    # Local jQuery (use relative path to theme directory)
    # 'jquery_local' => '/assets/js/jquery/jquery-3.3.1.min.js',

    # Editor styles in format
    # Example: ["/assets/css/editorstyles.css"]
    'editor_styles' => [
        //'/dist/css/theme.css'
    ],
);