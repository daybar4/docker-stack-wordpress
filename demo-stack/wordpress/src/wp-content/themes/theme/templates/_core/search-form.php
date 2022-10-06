<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e( 'Search', 'roots' ); ?>" required>
	<button type="submit"><?php _e( 'Search', 'roots' ); ?></button>
</form>