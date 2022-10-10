<?php

if (!$x['slides']) {
    return;
}
?>
<section class="slider_featured common_module_padding <?php echo $x['slider_background_color'] ?>">
    <div class="inner_wrapper">
        <div class="common_slider al_center" aria-live="polite">
            <?php
            foreach ($x['slides'] as $slide) {
                $img = false;
                ?>
                <div>
                    <div class="row jc_center">
                        <div class="col_xl_10 col_md_12 col_sm_12 col_xs_12">
                            <?php
                            if ($slide['circle_image']) {
                                echo Images::image($slide['circle_image'], 'small_square', true, array('class' => 'resp_img mgbot20 slider_featured_img rad_50 bc_dgrey'));
                                ?>
                            <?php } ?>
                            <?php
                            if ($slide['title']) {
                                ?>
                                <h2 class="x40 xfont2 mgbot20 upper"><?php echo $slide['title'] ?></h2>
                            <?php } ?>
                            <?php
                            if ($slide['description']) {
                                ?>
                                <p class="x16 xfont3 bold mgbot40"><?php echo $slide['description'] ?></p>
                            <?php } ?>
                            <?php
                            if ($slide['cta_buttons']) {
                                ?>
                                <div class="row">
                                    <?php
                                    $i = 1;

                                    $is_single = false;
                                    if (count($slide['cta_buttons']) == 1) {
                                        $is_single = true;
                                    }
                                    foreach ($slide['cta_buttons'] as $cta) {
                                        if (!$cta['cta_link']) {
                                            continue;
                                        }
                                        $class = 'col_xl_6 col_xs_12 xs_mgbot20 xs_al_center al_right';
                                        if ($i % 2) {
                                            $class .= ' al_right';
                                        } else {
                                            $class .= ' al_left';
                                        }
                                        $i++;

                                        if ($is_single) {
                                            $class = 'col_xl_12 al_center';
                                        }
                                        ?>
                                        <div class="<?php echo $class ?>">
                                            <?php
                                            echo zm_link($cta['cta_link'], 'btn bordered big x24 xfont2 black upper ' . $cta['background_color']);
                                            //<a href="#" title="{{ fakeWords(3) }}" class="btn bordered big bg_blue3 x24 xfont2 black upper">READ MORE</a>
                                            ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>