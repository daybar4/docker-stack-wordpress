<?php
$title = get_field('news_title');
if (!$title) {
    $title = Options::get_fallback('news_title');
    if (!$title) {
        $title = __('News', 'eye');
    }
}

$news_background_color = get_field('news_title_background_color');
if (!$news_background_color) {
    $news_background_color = Options::get_fallback('news_background_color');
}

$news_title_hide_completely = get_field('news_title_hide_completely');
if ($news_title_hide_completely) {
    $title = false;
}

?>
<div class="common_labeled_title mgbot10">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <?php
                if ($title) {
                    ?>
                    <h2 class="x34 bold xfont2 medium_label upper <?php echo $news_background_color ?>"><?php echo $title ?></h2>
                <?php } ?>
            </div>
        </div>
    </div>
</div>