<?php

function zm_setup() {
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// Add HTML5 markup for captions
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

}

add_action( 'after_setup_theme', 'zm_setup' );

add_theme_support( 'jquery-cdn' );
add_theme_support( 'jquery-local' );

/**
 * Navigation menus
 */

$navs = Config::get( 'nav_menus' );
if ( $navs ) {
	register_nav_menus( $navs );
}

/**
 * Admin bar
 */
add_action( 'after_setup_theme', 'remove_admin_bar' );
function remove_admin_bar() {
	if ( Config::get( 'admin_bar' ) ) {

	} else {
		show_admin_bar( Config::get( 'admin_bar' ) );
		add_filter( 'show_admin_bar', '__return_false' );
	}
}

/**
 * Output buffer
 */
if ( Config::get( 'output_buffer' ) ) {
	function app_output_buffer() {
		ob_start();
	}

	add_action( 'init', 'app_output_buffer' );
}

/**
 * Admin ajax url
 */

if ( Config::get( 'ajax' ) ) {
	function zonemedia_ajaxurl() {
		?>
		<script type="text/javascript">
			var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
		</script>
		<?php
	}

	add_action( 'wp_head', 'zonemedia_ajaxurl' );
}

/**
 * Remove emoji styles
 */
if ( Config::get( 'remove_emoji' ) ) {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}

/**
 * remove_recent_comments_style
 */
if ( Config::get( 'remove_recent_comments_style' ) ) {
	function zm_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array(
			$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
			'recent_comments_style'
		) );
	}

	add_action( 'widgets_init', 'zm_recent_comments_style' );
}

/**
 * Enable svg upload
 */
if ( Config::get( 'enable_svg_upload' ) ) {
	function zm_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

	add_filter( 'upload_mimes', 'zm_mime_types' );
}

/**
 * Json api
 */
if ( ! Config::get( 'json_api' ) ) {
	function remove_json_api() {

		// Remove the REST API lines from the HTML Header
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

		// Remove the REST API endpoint.
		remove_action( 'rest_api_init', 'wp_oembed_register_route' );

		// Turn off oEmbed auto discovery.
		add_filter( 'embed_oembed_discover', '__return_false' );

		// Don't filter oEmbed results.
		//remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
		// Remove oEmbed discovery links.
		//remove_action('wp_head', 'wp_oembed_add_discovery_links');
		// Remove oEmbed-specific JavaScript from the front-end and back-end.
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );

		// Remove all embeds rewrite rules.
		//add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
	}

	add_action( 'after_setup_theme', 'remove_json_api' );

	function disable_json_api()
	{

		// Filters for WP-API version 1.x
		add_filter('json_enabled', '__return_false');
		add_filter('json_jsonp_enabled', '__return_false');

		// Filters for WP-API version 2.x
		// TODO: rest_enabled is deprecated
		add_filter('rest_enabled', '__return_false');
		add_filter('rest_jsonp_enabled', '__return_false');
	}

	if (Config::get('json_api')) {
		add_action('after_setup_theme', 'disable_json_api');
	}
}

/**
 * Clean header
 */
if ( Config::get( 'clean_header' ) ) {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wlwmanifest_link' );
}

/**
 * Disable comments
 */
if ( Config::get( 'disable_comments' ) ) {

	// Disable support for comments and trackbacks in post types
	function df_disable_comments_post_types_support() {
		$post_types = get_post_types();
		foreach ( $post_types as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}

	add_action( 'admin_init', 'df_disable_comments_post_types_support' );

	// Close comments on the front-end
	function df_disable_comments_status() {
		return false;
	}

	add_filter( 'comments_open', 'df_disable_comments_status', 20, 2 );
	add_filter( 'pings_open', 'df_disable_comments_status', 20, 2 );

	// Hide existing comments
	function df_disable_comments_hide_existing_comments( $comments ) {
		$comments = array();

		return $comments;
	}

	add_filter( 'comments_array', 'df_disable_comments_hide_existing_comments', 10, 2 );

	// Remove comments page in menu
	function df_disable_comments_admin_menu() {
		remove_menu_page( 'edit-comments.php' );
	}

	add_action( 'admin_menu', 'df_disable_comments_admin_menu' );

	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
		global $pagenow;
		if ( $pagenow === 'edit-comments.php' ) {
			wp_redirect( admin_url() );
			exit;
		}
	}

	add_action( 'admin_init', 'df_disable_comments_admin_menu_redirect' );

	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	}

	add_action( 'admin_init', 'df_disable_comments_dashboard' );

	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	}

	add_action( 'init', 'df_disable_comments_admin_bar' );
}

/**
 * Post thumbnail size
 * image_post_thumbnail
 */
$postThumbnailSize = Config::Get( 'image_post_thumbnail' );
if ( isset( $postThumbnailSize ) && is_array( $postThumbnailSize ) ) {
	set_post_thumbnail_size( $postThumbnailSize[0], $postThumbnailSize[1], $postThumbnailSize[2] );
}

/**
 * Setup image sizes
 */
$imageSizes = Config::get( 'image_sizes' );
if ( isset( $imageSizes ) && is_array( $imageSizes ) ) {
	foreach ( $imageSizes as $image_size ) {
		if ( function_exists( 'fly_add_image_size' ) ) {
			fly_add_image_size( $image_size[0], $image_size[1], $image_size[2], $image_size[3] );
		} else {
			add_image_size( $image_size[0], $image_size[1], $image_size[2], $image_size[3] );
		}
	}
}

/**
 * Active menu classes
 */
function zm_cpt_active_menu( $menu ) {
	$activeClasses = Config::get( 'active_menu_classes' );
	if ( is_array( $activeClasses ) ) {
		foreach ( $activeClasses as $cpt_slug ) {
			if ( $cpt_slug === get_post_type() ) {
				$menu = str_replace( 'active', '', $menu );
				$menu = str_replace( $cpt_slug, $cpt_slug . ' active', $menu );
			}
		}
	}

	return $menu;
}

add_filter( 'nav_menu_css_class', 'zm_cpt_active_menu', 400 );

/**
 * Remove default image sizes
 */
function zm_remove_default_image_sizes( $sizes ) {
	unset( $sizes['thumbnail'] );
	unset( $sizes['medium'] );
	unset( $sizes['large'] );

	return $sizes;
}

//add_filter( 'intermediate_image_sizes_advanced', 'zm_remove_default_image_sizes' );

/**
 * Widget areas
 */

add_action( 'widgets_init', 'zm_widgets_init' );

function zm_widgets_init() {
	$widgets = Config::get( 'widgets' );
	if ( is_array( $widgets ) ) {
		foreach ( $widgets as $key => $name ) {
			register_sidebar( array(
				'name'          => $name,
				'id'            => $key,
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			) );
		}
	}
}

if ( Config::get( 'clean_dashboard' ) ) {
	//Remove WordPress Widgets from Dashboard Area
	function remove_wp_dashboard_widgets() {
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	}

	add_action( 'wp_dashboard_setup', 'remove_wp_dashboard_widgets' );
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}

/**
 * Disable WP search
 * */
if ( Config::get( 'disable_search' ) ) {
	function fb_filter_query( $query, $error = true ) {
		if ( is_search() ) {
			$query->is_search = false;
			if ( $error == true ) {
				$query->is_404 = true;
			}
		}
	}

	add_action( 'parse_query', 'fb_filter_query' );
	add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
}

/**
 * Disable auto <p> in contact form 7
 **/
 
if(Config::get("disable_cf7_auto_p")){
    add_filter( 'wpcf7_autop_or_not', '__return_false' );
}

if ( Config::get( 'custom_login_logo' ) ) {
	function custom_loginlogo() {
		echo '<style type="text/css">
.login h1 a {
background-image: url(' . get_template_directory_uri() . '/' . Config::get( 'custom_login_logo' ) . ') !important;
background-size: 200px;
width: 200px;
 }
</style>';
	}

	add_action( 'login_head', 'custom_loginlogo' );

	function my_login_logo_url() {
		return home_url();
	}

	add_filter( 'login_headerurl', 'my_login_logo_url' );
}

/**
 * Auto generated robots
 */
if (Config::get('auto_robots.txt')) {
	add_action('init', function () {
		$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
		if (strpos($url_path, 'robots.txt') !== false) {
			header('Content-Type: text/plain');
			echo 'User-agent: *' . PHP_EOL;
			echo 'Disallow: /wp-admin/' . PHP_EOL;
			echo 'Allow: /wp-admin/admin-ajax.php' . PHP_EOL;
			echo 'Sitemap: ' . get_site_url() . '/sitemap.xml' . PHP_EOL;
			exit;
		}
	});
}