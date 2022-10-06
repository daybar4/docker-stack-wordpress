<?php

/**
 * ZoneMedia includes
 *
 * The $zm_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @author ZoneMedia Digital
 */
$zm_includes = array( 'lib/theme/theme.php', 'lib/project/project.php', );

foreach ( $zm_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( 'Error locating %s for inclusion', $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset( $file, $filepath );
