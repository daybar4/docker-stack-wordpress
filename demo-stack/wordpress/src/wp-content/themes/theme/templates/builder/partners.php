<?php
if (!$x['partners']) {
    return;
}
?>
<section class="our_partners common_module_padding">
    <div class="inner_wrapper">
        <ul class="our_partners_list">
            <?php
            foreach ($x['partners'] as $partner) {
                $image = false;
                if ($partner['partner_image']) {
                    $image = Images::get($partner['partner_image'], 'partner');
                }
                ?>
                <li>
                    <div class="row">
                        <div class="col_xl_3 col_md_12 col_sm_12 col_xs_12 mgbot30">
                            <?php
                            if ($image) {
                                ?>
                                <img src="<?php echo $image ?>" alt="<?php echo Images::alt($partner['partner_image']) ?>" class="resp_img">
                            <?php } ?>
                        </div>
                        <div class="col_xl_9 col_md_12 col_sm_12 col_xs_12">
                            <div class="user_content">
                                <?php echo $partner['partner_content'] ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>