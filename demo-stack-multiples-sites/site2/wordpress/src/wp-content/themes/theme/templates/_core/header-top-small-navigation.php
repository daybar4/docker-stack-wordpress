<?php
$header_other_websites_menu = Options::get_fallback( 'header_other_websites_menu' );
if ( ! $header_other_websites_menu ) {
	return;
}

$first  = array_slice( $header_other_websites_menu, 0, 6 );
$second = array_slice( $header_other_websites_menu, 6, 9999 );

if ( ! $first ) {
	return;
}
?>
<div class="mtz">
    <a class="dropdown-trigger top_bar_links_trigger gutter dnone md_show sm_show xs_show" href="#" data-target="dropdown_top_bar_links"><?php _e( 'Other websites', 'eye' ) ?> <span class="ico_down x12"></span></a>
    <ul class="dropdown-content top_bar_links" id="dropdown_top_bar_links">
		<?php
		foreach ( $first as $f ) {
			?>
            <li><?php echo zm_link( $f['item'] ) ?></li>
			<?php
		}
		?>
		<?php
		if ( $second && ! empty( $second ) ) {
			?>
            <li>
                <button class="dropdown-trigger other_websites_trigger dgrey2 gutter md_none sm_none xs_none" data-target="dropdown_other_websites" aria-label="<?php _e( 'Other websites', 'eye' ) ?>"><?php _e( 'Other websites', 'eye' ) ?> <span class="ico_down x12"></span></button>
                <ul class="dropdown-content other_websites" id="dropdown_other_websites">
					<?php
					foreach ( $second as $f ) {
						?>
                        <li><?php echo zm_link( $f['item'] ) ?></li>
						<?php
					}
					?>
                </ul>
            </li>
		<?php } ?>
    </ul>
</div>