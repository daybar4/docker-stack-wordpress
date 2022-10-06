<?php
$thumb = false;
if (Images::thumbnail_id()) {
    $thumb = Images::get(Images::thumbnail_id(), 'thumb');
}
?>
<li class="col_xl_12 col_xs_12 mgbot50">
    <div class="news_card news_card_featured">
        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
            <div class="row">
                <div class="col_xl_5 col_xs_12 nogutter xs_order2">
                    <div class="card_text">
                        <h3 class="x20 xfont5 mgbot10"><?php the_title() ?></h3>
                        <p class="x12 mgbot15">
                            <?php
                            echo get_the_date() . ' - ' . get_the_time();
                            ?>
                        </p>
                        <div class="user_content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
                <div class="col_xl_7 col_xs_12 nogutter xs_order1">
                    <div class="card_img">
                        <?php
                        if (Images::thumbnail_id()) {
                            echo wp_get_attachment_image(Images::thumbnail_id(), 'thumb', false, array('class' => 'ob_fit_cover'));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>
    </div>
</li>
