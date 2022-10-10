<?php

$title = $x['title'];
$class = $x['title_background_color'];
$background_image = $x['background_image'];

/**
 * @todo background image size
 */

?>
<section class="hero_module home_hero resp_img">
    <?php
    if ($background_image) {
        echo wp_get_attachment_image($background_image, 'full', false, array('class' => 'ob_fit_cover'));
        ?>
    <?php } ?>
    <?php
    if ($title) {
        ?>
        <div class="row al_center ai_center hero_overlay">
            <div class="col_xl_12">
                <h1 class="x90 xfont2 big_label <?php echo $class ?>"><?php echo $title ?></h1>
            </div>
        </div>
    <?php } ?>
</section>