<?php

$news_page_header_image = Options::get_fallback('news_page_header_image');
if (!$news_page_header_image) {
    $news_page_header_image = Options::get_fallback('default_page_header_image');
}

$title = Options::get_fallback('news_title');
if (!$title) {
    $title = __('News', 'eye');
}

$news_background_color = Options::get_fallback('news_background_color');

$featured_news_article = Options::get('featured_news_article');
?>
<div class="hero_module resp_img">
    <?php
    if ($news_page_header_image) {
        echo wp_get_attachment_image( $news_page_header_image, 'full', false, array( 'class' => 'ob_fit_cover' ) );
        ?>
    <?php } ?>
    <div class="hero_overlay">
        <div class="wrapper h100">
            <div class="row h100 ai_end">
                <div class="col_xl_12 nogutter">
                    <div class="row mgbot20">
                        <div class="col_xl_12">
                            <h1 class="x46 xfont2 medium_label upper <?php echo $news_background_color ?>"><?php echo $title ?></h1>
                        </div>
                    </div>
                    <?php
                    if ($featured_news_article) {
                        ?>
                        <div class="row mgbot20">
                            <div class="col_xl_6 co_md_8 col_sm_8 col_xs_12 xs_nogutter">
                                <div class="hero_card">
                                    <h2 class="x18 bold mgbot15"><?php echo $featured_news_article->post_title ?></h2>

                                    <p class="x12 mgbot15">
                                        <?php
                                        echo get_the_date('', $featured_news_article) . ' - ' . get_the_time('', $featured_news_article);
                                        ?>
                                    </p>

                                    <div class="user_content">
                                        <?php
                                        echo apply_filters('the_content', get_the_excerpt($featured_news_article));
                                        ?>
                                    </div>

                                    <a href="<?php echo get_the_permalink($featured_news_article) ?>" title="<?php echo $featured_news_article->post_title ?>" class="x16 bold link_color01 underlined dinblock mgtop5"><?php _e('Read more', 'eye') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
