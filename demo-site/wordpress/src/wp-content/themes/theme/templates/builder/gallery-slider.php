<?php
if (!$x['gallery']) {
    return;
}

$class = '';
if ($x['background']) {
    $class = 'bg_lgrey2';
}
?>
<section class="gallery common_module_padding <?php echo $class ?>" aria-live="polite">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <?php
                if ($x['title']) {
                    ?>
                    <h3 class="x24 xfont3 bold mgbot30"><?php echo $x['title'] ?></h3>
                <?php } ?>
                <div class="gallery_slider_for mgbot20">
                    <?php
                    foreach ($x['gallery'] as $image) {
                        $title = $image['caption'];
                        ?>
                        <div>
                            <?php
                            echo Images::image($image['ID'], 'video_poster', true, array('class' => 'resp_img'));
                            ?>
                            <p class="x12 white gallery_caption"><?php echo $title; ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="gallery_slider_nav">
                    <?php
                    foreach ($x['gallery'] as $image) {
                        ?>
                        <div>
                            <?php
                            echo Images::image($image['ID'], 'thumbnail_gallery', true, array('class' => 'resp_img'));
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
                if ($x['gallery_description']) {
                    ?>
                    <div class="user_content">
                        <?php echo $x['gallery_description']; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>