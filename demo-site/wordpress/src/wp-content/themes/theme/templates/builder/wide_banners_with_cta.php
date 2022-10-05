<?php
if ( ! $x['banners'] ) {
	return;
}
?>
<section class="eye_2021_module common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
			<?php
			foreach ( $x['banners'] as $b ) {
				$image = false;
				?>
                <div class="col_xl_12 mgbot50">
                    <div class="img_card">
                        <header class="card_header mgbot20">
							<?php
							if ( $b['banner_image'] ) {
								echo Images::image( $b['banner_image'], 'wide_banner', true, array( 'class' => 'resp_img' ) );
								?>
							<?php } ?>
							<?php
							if ( $b['banner_titles'] ) {
								$heading = 'h3';
								if ( $b['heading'] ) {
									$heading = $b['heading'];
								}

								?>
                                <div class="card_title_container">
                                    <<?php echo $heading?>>
										<?php
										foreach ( $b['banner_titles'] as $key => $bt ) {

											$class = 'card_title';
											$br    = '';
											if ( count( $b['banner_titles'] ) > 1 && $key == 0 ) {
												$class = 'card_pretitle mgbot10';
												$br    = '<br />';
											}
											?>
                                            <span class="<?php echo $class ?> x34 xfont2 upper <?php echo $bt['background_color'] ?>"><?php echo $bt['title'] ?></span>
											<?php
											echo $br;
											?>
										<?php } ?>
                                    </<?php echo $heading ?>>
                                </div>
							<?php } ?>
                        </header>
						<?php
						if ( $b['text_content'] ) {
							?>
                            <div class="card_text mgbot15 user_content">
								<?php echo $b['text_content']; ?>
                            </div>
						<?php } ?>
                    </div>
					<?php
					if ( $b['cta_links'] ) {
						?>
                        <ul class="common_links_list x16 separator">
							<?php
							foreach ( $b['cta_links'] as $c ) {
								echo '<li>' . zm_link( $c['cta_link'] ) . '</li>';
							}
							?>
                        </ul>
						<?php
					}

					if ( $b['banner_cta_link'] ) {
						$class = '';
						if ( $b['cta_links'] ) {
							$class = 'mgtop30';
						}

						echo zm_link( $b['banner_cta_link'], 'btn giant x24 xfont2 black upper dblock ' . $b['banner_cta_link_bg_color'] . ' ' . $class );
					}

					?>
                </div>
			<?php } ?>
        </div>
    </div>
</section>