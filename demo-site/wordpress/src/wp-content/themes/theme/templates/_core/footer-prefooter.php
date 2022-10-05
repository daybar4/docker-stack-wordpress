<?php
$pf_title_1 = Options::get_fallback('pf_title_1');
$pf_title_2 = Options::get_fallback('pf_title_2');
$pf_bottom_left_cta_links = Options::get_fallback('pf_bottom_left_cta_links');
$right_cta_buttons = Options::get_fallback('right_cta_buttons');
?>
<div class="pre_footer" role="region" aria-label="<?php _e('Contact Us', 'eye') ?>" id="prefooter">
    <div class="inner_wrapper">
        <div class="row ai_center">
            <div class="col_xl col_xs_12 xs_mgbot30">
                <?php
                if ($pf_title_1) {
                    ?>
                    <p class="x36 md_x30 sm_x30 xs_x30 xfont2 white upper mgbot30"><?php echo $pf_title_1 ?></p>
                <?php } ?>
                <?php if ($pf_title_2) { ?>
                    <p class="x20 md_x14 sm_x14 xs_x14 white bold mgbot10"><?php echo $pf_title_2 ?></p>
                <?php } ?>
                <?php
                if ($pf_bottom_left_cta_links) {
                    foreach ($pf_bottom_left_cta_links as $pf) {
                        ?>
                        <p class="x20 md_x14 sm_x14 xs_x14 white mgbot5">
                            <?php
                            echo $pf['title'] . ' ';
                            if ($pf['cta_link']) {
                                echo zm_link($pf['cta_link'], 'underlined bold');
                            }
                            ?>
                        </p>
                        <?php
                    }
                }
                ?>

            </div>
            <div class="col_xl_2 col_xs_12 flex_basis_150">
                <?php
                if ($right_cta_buttons) {
                    ?>
                    <ul class="pre_footer_buttons">
                        <?php
                        foreach ($right_cta_buttons as $r) {
                            if (!$r['cta_link']) {
                                continue;
                            }
                            ?>
                            <li>
                                <?php
                                echo zm_link($r['cta_link'], 'btn medium bg_yellow x24 md_x20 sm_x20 xs_x20 xfont2 black upper mgbot20');
                                ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>