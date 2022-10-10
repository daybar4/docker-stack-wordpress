<?php
/**
 * Template Name: Pagebuilder
 */
while ( have_posts() ):
	the_post();
	get_template_part( 'templates/builder/builder' );
endwhile;