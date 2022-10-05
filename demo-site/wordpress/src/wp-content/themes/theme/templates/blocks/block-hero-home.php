<?php
$id = 'testimonial-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
$class = get_field('title_background_color');
$background_image = get_field('background_image');

/**
 * @todo background image size
 */

?>
<section class="hero_module home_hero resp_img <?php echo $className ?>">
    <?php
    if ($background_image) {
        ?>
        <img src="<?php echo Images::get($background_image, 'full') ?>" alt="<?php echo Images::alt($background_image) ?>" class="ob_fit_cover">
    <?php } ?>
    <div class="row al_center ai_center hero_overlay">
        <div class="col_xl_12">
            <h1 class="x90 xfont2 big_label <?php echo $class ?>"><?php echo $title ?></h1>
        </div>
    </div>
</section>