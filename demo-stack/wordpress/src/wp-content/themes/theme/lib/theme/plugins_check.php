<?php

/**
 * Secret page redirect
 */
if (is_admin() && isset($_GET['zonemedia'])) {
	wp_redirect('index.php?page=zonemedia_plugins');
}

add_action('admin_menu', 'zonemedia_plugins_menu');

function zonemedia_plugins_menu()
{
	add_dashboard_page('ZoneMedia Suggestions', 'ZoneMedia Suggestions', 'manage_options', 'zonemedia_plugins', 'zonemedia_plugins_action');
	remove_submenu_page('index.php', 'zonemedia_plugins');
}

function zonemedia_plugins_action()
{
	?>
	<div class="wrap about-wrap">
		<h1>ZoneMedia Suggestions</h1>

		<div class="about-text">
			List of common suggestions for proper WordPress development
		</div>

		<?php plugins_tabs_generate(); ?>
		<div class="changelog">
			<?php plugins_tab_content(); ?>
		</div>
	</div>
	<?php
}

function plugins_tabs_generate()
{

	?>
	<h2 class="nav-tab-wrapper">
		<a href="?page=zonemedia_plugins" class="nav-tab <?php if (!isset($_GET['tab'])) {
			echo 'nav-tab-active';
		} ?>">General
		</a>
		<a href="?page=zonemedia_plugins&tab=checklist" class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'checklist') {
			echo 'nav-tab-active';
		} ?>">Checklist
		</a>
		<a href="?page=zonemedia_plugins&tab=plugins" class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'plugins') {
			echo 'nav-tab-active';
		} ?>">Plugins
		</a>
		<a href="?page=zonemedia_plugins&tab=performance" class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'performance') {
			echo 'nav-tab-active';
		} ?>">Performance
		</a>
		<a href="?page=zonemedia_plugins&tab=debug" class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'debug') {
			echo 'nav-tab-active';
		} ?>">Debug
		</a>
	</h2>
	<?php
}

function plugins_tab_content()
{

	$tab = false;
	if (isset($_GET['tab'])) {
		$tab = $_GET['tab'];
	}
	switch ($tab) {
		case 'plugins':
			plugins_tab_content_plugins();
			break;

		case 'checklist':
			checklist_tab_content_plugins();
			break;

		case 'performance':
			plugins_tab_content_performance();
			break;

		case 'debug':
			plugins_tab_content_debug();
			break;

		default:
			#general
			plugins_tab_content_general();
			break;
	}
}

function plugins_tab_content_general()
{
	?>
	<h2>General suggestions</h2>
	<?php
}

function checklist_tab_content_plugins()
{
	$checklist = Checklist::getInstance();
	?>
	<h2>Checklist</h2>
	<?php
	$checklist::render();
}

function plugins_tab_content_performance()
{
	?>
	<h2>Performance suggestions</h2>
	<hr/>
	<h3>1. .htaccess optimization</h3>

	<p>
		We strongly recommend to optimize .htaccess file using following techniques:
	</p>

	<p>
		<a href="https://gist.github.com/Zodiac1978/3145830" target="_blank">Make WordPress faster - a safe htaccess way Raw
		</a>
	</p>
	<p>
		<a href="https://www.pixelemu.com/documentation/wordpress-tutorials/how-to-speed-up-wordpress-site-htaccess-optimization-part-1" target="_blank">HOW TO SPEED UP WORDPRESS SITE - HTACCESS OPTIMIZATION, PART 1.
		</a>
	</p>
	<p>
		Please note that this process is also done by the Comet Cache Pro plugin
	</p>
	<hr/>
	<h3>2. Image optimization</h3>
	<p>
		All images should be optimized using one of the following tools
		<a href="https://sk.wordpress.org/plugins/resmushit-image-optimizer/" target="_blank">reSmush.it</a>
		,
		<a href="https://sk.wordpress.org/plugins/imsanity/" target="_blank">Imsanity</a>
	</p>

	<hr/>
	<h3>3. HTML / CSS / JS optimization</h3>
	<p>
		We strongly recommend to optimize all javascript and stylesheet files using the following plugin
		<a href="https://sk.wordpress.org/plugins/autoptimize/" target="_blank">Autoptimize</a>
	</p>
	<p>
		Please note that this process is also done by the Comet Cache Pro plugin
	</p>

	<hr/>
	<h3>4. Google PageSpeed Insights</h3>
	<p>
		You can test you site performance by clicking on the following link
		<a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo esc_url(home_url('/')); ?>" target="_blank">
			<strong>google pagespeed insights</strong>
		</a>
	</p>
	<?php
}

function plugins_tab_content_plugins()
{
	?>
	<h2>Plugin suggestions</h2>
	<ol>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=comet+cache&tab=search&type=term" target="_blank">Comet Cache PRO</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=resmush.it&tab=search&type=term" target="_blank">reSmush.it</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=easy+wp+smtp&tab=search&type=term" target="_blank">Easy WP SMTP</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=Email+Templates&tab=search&type=term" target="_blank">Email Templates</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=Contact+form+7&tab=search&type=term" target="_blank">Contact Form 7</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=advanced+cf7+db&tab=search&type=term" target="_blank">Advanced CF7 DB</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=wordfence&tab=search&type=term" target="_blank">Wordfence Security</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=iwp+client&tab=search&type=term" target="_blank">Infinite WP Client</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=duplicator&tab=search&type=term" target="_blank">Duplicator</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=really+simple+ssl&tab=search&type=term" target="_blank">Really Simple SSL</a>
		</li>
		<li>
			<a href="<?php echo get_admin_url() ?>plugin-install.php?s=yoast+seo&tab=search&type=term" target="_blank">Yoast SEO</a>
		</li>
	</ol>
	<?php
}

function plugins_tab_content_debug()
{
	?>
	<h2>Theme Config</h2>
	<?php
	echo "<table cellspacing='0' cellpadding='5' border='1'>\n";
	foreach (Config::$config as $key_val => $value) {
		if (is_array($value) == 1) {
			echo "<tr>";
			echo "<td>" . $key_val . "</td>";
			echo "<td>" . json_encode($value) . "</td>";
			echo "</tr>";
		} else {

			echo "<td width='120'>" . $key_val . "</td>";
			echo "<td width='120'>" . (is_bool($value) ? ($value ? "1" : "0") : $value) . "</td>";
			echo "</tr>";
		}
	}
	echo "</table>\n";
	?>
	<?php
}

function show_array($array)
{
	if (is_array($array) == 1) {

	} else {
		return;
	}
}