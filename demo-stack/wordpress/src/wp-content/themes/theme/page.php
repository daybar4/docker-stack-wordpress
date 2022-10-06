<?php
/**
 * Page
 *
 * @author ZoneMedia Digital
 */

while ( have_posts() ) : the_post();
	get_template_part( 'templates/page/page' );
endwhile;