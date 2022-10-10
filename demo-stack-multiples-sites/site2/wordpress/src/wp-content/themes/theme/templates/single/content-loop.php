<?php
$thumb = false;
if (Images::thumbnail_id()) {
    $thumb = Images::get(Images::thumbnail_id(), 'thumb');
}

$featured_article = get_field('featured_article');
$class = '';
if ($featured_article) {
    $class = 'featured';
}

?>
<li class="col_xl_6 col_xs_12 mgbot50">
    <div class="news_card <?php echo $class ?>">
        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
            <div class="card_header mgbot15">
                <?php
                if (Images::thumbnail_id()) {
                    echo Images::image(Images::thumbnail_id(), 'thumb', true, array('class' => 'resp_img'));
                }
                ?>
            </div>
            <div class="card_text mgbot15">
                <h3 class="x20 xfont5 mgbot10"><?php the_title() ?></h3>
                <p class="x12 mgbot15">
                    <?php
                    echo get_the_date() . ' - ' . get_the_time();
                    ?>
                </p>
                <div class="user_content">
                    <?php
                    echo apply_filters('the_content', customExcerpt(get_the_excerpt(), 50, '...'));
                    ?>
                </div>
                <span class="x16 bold link_color01 underlined dinblock"><?php _e('Read more', 'eye') ?></span>
            </div>
        </a>
    </div>
</li>