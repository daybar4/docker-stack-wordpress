<?php

if ($admin_slug = Config::get('admin_slug')) {

	# Check if .htaccess has the rewrite rule
	$hasRule = strpos(file_get_contents(ABSPATH . '/.htaccess'), $admin_slug . '(.*)');

	# If user is not logged in as admin and rewrite rule is configured
	# then he has nothing to do on wp-admin wp-login wp-login.php pages
	if ( ! is_user_logged_in() && $hasRule && ! wp_doing_ajax() ) {

		$is_admin           = strpos( $_SERVER['REQUEST_URI'], 'wp-admin' ) != false;
		$is_login           = strpos( $_SERVER['REQUEST_URI'], 'wp-login' ) != false;
		$is_lost_password   = strpos( $_SERVER['REQUEST_URI'], 'action=lostpassword' ) != false;
		$is_check_email     = strpos( $_SERVER['REQUEST_URI'], 'checkemail=confirm' ) != false;
		$is_change_password = strpos( $_SERVER['REQUEST_URI'], 'action=rp' ) != false;
		$is_reset_password  = strpos( $_SERVER['REQUEST_URI'], 'action=resetpass' ) != false;

		if ( $is_admin || ( $is_login && ! $is_lost_password && ! $is_check_email && ! $is_change_password && ! $is_reset_password ) ) {
			if ( isset( $_GET['loggedout'] ) && $_GET['loggedout'] == 'true' ) {
				wp_safe_redirect( get_home_url() );
			} else {
				wp_safe_redirect( get_home_url() . '/404' );
			}
			die;
		}
	}

	# Regenerate rewrite for custom url on permalink save
	# only when user is logged in and is in admin area
	# and it also only triggers when user visits permalinks page in wordpress
	if (is_user_logged_in() && is_admin()) {
		add_action('init', function () use ($admin_slug) {
			add_rewrite_rule($admin_slug . '(.*)', 'wp-login.php?%{QUERY_STRING}');
		});
	}

	# If rewrite rule is set up, and user is not logged in
	# Then apply new login url so login data can be submitted
	if (!is_user_logged_in() && $hasRule && !wp_doing_ajax()) {
		add_filter('login_url', function ($login_url, $redirect) use ($admin_slug) {
			return str_replace("wp-login.php", $admin_slug, $login_url);
		}, 10, 2);

		add_action('login_form', function () use ($admin_slug) {
			$your_content = ob_get_contents();
			$your_content = str_replace("wp-login.php", $admin_slug, $your_content);
			ob_get_clean();
			echo $your_content;
		}, 1);
	}
}