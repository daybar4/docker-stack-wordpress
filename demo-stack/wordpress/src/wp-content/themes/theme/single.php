<?php

/**
 * Single
 *
 * @author ZoneMedia Digital
 */

while ( have_posts() ) : the_post();
	get_template_part( 'templates/single/single' );
endwhile;
