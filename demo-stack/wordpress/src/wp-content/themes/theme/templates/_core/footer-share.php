<?php
$share_url   = esc_url( get_the_permalink() );
$share_title = esc_html( get_the_title() );
?>
<div class="share_page" role="region" aria-label="<?php _e( 'Share this page', 'eye' ) ?>">
    <div class="wrapper">
        <div class="row ai_center">
            <div class="col_xl_6 col_sm_12 col_xs_12 sm_al_center xs_al_center">
                <p class="x14 dinblock vmid footer_share_title"><span><?php _e( 'Share this page', 'eye' ) ?></span></p>
                <div class="ep-a_share dinblock vmid sm_show xs_show sm_mgbot30 xs_mgbot30">
                    <div class="ep_share">
                        <ul>
                            <li>
                                <div class="ep-p_text ep-layout_facebook">
                                    <a href="https://www.facebook.com/share.php?u=<?php echo $share_url; ?>" title="<?php _e( 'Share on facebook', 'eye' ) ?>" target="_blank">
                                        <span class="ep_name"><?php _e( 'Share on facebook', 'eye' ) ?></span><span class="ep_icon"></span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="ep-p_text ep-layout_twitter">
                                    <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode( $share_title ) ?>&url=<?php echo $share_url ?>" title="<?php _e( 'Share on twitter', 'eye' ) ?>" target="_blank">
                                        <span class="ep_name"><?php _e( 'Share on twitter', 'eye' ) ?></span><span class="ep_icon"></span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="ep-p_text ep-layout_linkedin">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url ?>" title="<?php _e( 'Share on linkedin', 'eye' ) ?>" target="_blank">
                                        <span class="ep_name"><?php _e( 'Share on linkedin', 'eye' ) ?></span><span class="ep_icon"></span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col_xl_6 col_sm_12 col_xs_12 al_right sm_al_center xs_al_center">
				<?php
				$fs_newsletter_cta = Options::get_fallback( 'fs_newsletter_cta' );
				if ( $fs_newsletter_cta ) {
					echo zm_link( $fs_newsletter_cta, 'vlink dinblock' );
				}
				?>
            </div>
        </div>
    </div>
</div>
