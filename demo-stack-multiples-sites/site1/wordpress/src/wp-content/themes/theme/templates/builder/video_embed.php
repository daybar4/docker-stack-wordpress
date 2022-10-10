<?php

if ( ! $x['video_file'] && ! $x['video_embed'] ) {
	return;
}
$poster = '';
if ( $x['video_poster'] ) {
	$poster = Images::get( $x['video_poster'], 'video_poster' );
}

$class = '';
if ( $x['square_video'] ) {
	$class = 'square';
}
?>
<section class="home_embed_video common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <div class="embed_container <?php echo $class ?>">
					<?php
					if ( $x['type'] == 'file' ) {
						?>
                        <video poster="<?php echo $poster ?>" width="1920" height="1080" preload="none" controls>
                            <source src="<?php echo $x['video_file'] ?>" type="video/mp4">
                        </video>
					<?php } elseif ( $x['type'] == 'iframe' ) {
						echo $x['video_iframe'];
					} else { ?>
						<?php
						echo $x['video_embed'];
						?>
					<?php } ?>
	                <?php
	                if ( $x['description_sr_only'] ) {
		                ?>
                        <p class="sr-only" tabindex="0"><?php echo $x['description_sr_only'] ?></p>
	                <?php } ?>
                </div>
				<?php
				if ( $x['title'] ) {
					?>
                    <p class="x20 xfont3 white video_caption mgbot20"><?php echo $x['title'] ?></p>
				<?php } ?>
				<?php
				if ( $x['description'] ) {
					?>
                    <p class="x16 xfont3 bold mgbot30"><?php echo $x['description'] ?></p>
				<?php } ?>
				<?php
				if ( $x['cta_links'] ) {
					?>
                    <ul class="common_links_list x16 separator">
						<?php
						foreach ( $x['cta_links'] as $link ) {
							if ( ! $link || ! $link['cta_link'] ) {
								continue;
							}

							echo '<li>' . zm_link( $link['cta_link'] ) . '</li>';
						}
						?>
                    </ul>
				<?php } ?>
            </div>
        </div>
    </div>
</section>
