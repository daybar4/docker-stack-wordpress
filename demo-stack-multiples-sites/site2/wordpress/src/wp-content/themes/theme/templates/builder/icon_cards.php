<?php
if (!$x['card_icons']) {
    return;
}
if ($x['grey_background']) {
    ?>
    <div class="common_module_padding icon_cards_container bg_lgrey2">
<?php } ?>
    <section class="icon_card_module common_module_padding">
        <div class="inner_wrapper">
            <ul class="row">
                <?php
                foreach ($x['card_icons'] as $c) {
                    ?>
                    <li class="col_xl_4 col_xs_12">
                        <div class="icon_card">
                            <div class="card_container mgbot20 <?php echo $c['background_color'] ?>">
                                <?php
                                if ($c['icon']) {
                                    ?>
                                    <img src="<?php echo $c['icon'] ?>" alt="" class="resp_img">
                                <?php } ?>
                                <?php
                                if ($c['cta_link']) {
                                    ?>
                                    <div class="card_btn_container">
                                        <?php
                                        echo zm_link($c['cta_link'], 'btn giant x24 md_x18 sm_x18 xs_x18 xfont2 black upper ' . $c['cta_link_background_color']);
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php
if ($x['grey_background']) {
    ?>
    </div>
<?php } ?>