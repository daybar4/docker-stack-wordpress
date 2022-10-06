<?php
if (!is_user_logged_in()) {
	return;
}

$revokeUsers = Config::get('revoke_user_access');

foreach ($revokeUsers as $user) {
	if (in_array(get_current_user_id(), $user['user_id'])) {

		# Hide plugin from plugin list
		if (isset($user['plugin_listing']) && is_array($user['plugin_listing'])):
			$revokedPlugins = $user['plugin_listing'];
			add_filter('all_plugins', function ($plugins) use ($revokedPlugins) {
				$viewable_plugins = array();
				foreach ($plugins as $plugin_file => $plugin) {
					$plug = explode("/", $plugin_file)[0];
					if (!in_array($plug, $revokedPlugins)) {
						$viewable_plugins[$plugin_file] = $plugin;
					}
				}
				return $viewable_plugins;
			});
		endif;

		# Hide plugin from menu page
		if (isset($user['menu_slugs']) && is_array($user['menu_slugs'])):
			add_action('admin_menu', function () use ($user) {
				foreach ($user['menu_slugs'] as $page) {
					remove_menu_page($page);
					remove_submenu_page('options-general.php', $page);
					remove_submenu_page('tools.php', $page);
				}

			}, 999);
		endif;
	}
}

