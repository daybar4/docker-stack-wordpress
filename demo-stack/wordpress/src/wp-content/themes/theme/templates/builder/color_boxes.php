<?php
$color_boxes = $x['color_boxes'];
if ( ! $color_boxes ) {
	return;
}
?>
<section class="card_container common_module_padding">
    <div class="inner_wrapper">
        <ul class="row">
			<?php
			foreach ( $color_boxes as $c ) {
				$class  = 'col_xl_12 col_xs_12';
				$class2 = '';

				$bg_color = $c['background_color'];

				$font_size_class = 'x34';
				switch ( $c['box_size'] ) {
					case 'full':
						$class = 'col_xl_12 col_xs_12';
						break;

					case 'half':
						$class = 'col_xl_6 col_xs_12';
						break;

					case '1/4':
						$class           = 'col_xl_3 col_md_6 col_sm_6 col_xs_12 mgbot30';
						$class2          = 'colored_card_small';
						$bg_color        .= ' mgbot10';
						$font_size_class = 'x24';
						break;
				}

				$box_link = $c['box_link'];

                $heading = 'h3';
                if(isset($c['heading']) && !empty($c['heading'])) {
                    $heading = $c['heading'];
                }

				?>
                <li class="mgbot50 <?php echo $class ?>">
                    <div class="colored_card <?php echo $class2 ?>">
						<?php
						if ( $box_link ) {
						$target = '';
						if ( $box_link['target'] && ! empty( $box_link['target'] ) ) {
							$target = 'target="' . $box_link['target'] . '"';
						}
						?>
                        <a href="<?php echo $box_link['url'] ?>" <?php echo $target ?> title="<?php echo $box_link['title'] ?>">
							<?php
							}
							?>
                            <header class="card_header mgbot20 <?php echo $bg_color ?>">
                                <div class="card_title_container">
                                    <<?php echo $heading?>>
										<?php
										if ( $c['before_title'] ) {
											?>
                                            <span class="card_pretitle <?php echo $font_size_class ?> xfont2 upper mgbot10"><?php echo $c['before_title'] ?></span><br/>
											<?php
										}
										?>
                                        <span class="card_title <?php echo $font_size_class ?> xfont2 upper"><?php echo $c['title'] ?></span>
                                    </<?php echo $heading?>>
                                </div>
                            </header>
							<?php
							if ( $box_link ) {
							?>
                        </a>
					<?php
					}
					?>
                        <div class="card_text mgbot15 user_content">
							<?php echo $c['short_description'] ?>
                        </div>
						<?php
						if ( $c['cta_link'] ) {
							?>
                            <div class="card_link user_content">
								<?php
								echo zm_link( $c['cta_link'] );
								?>
                            </div>
						<?php } ?>
                    </div>
                </li>
			<?php } ?>
        </ul>
    </div>
</section>