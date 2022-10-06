<?php
$title = get_field('title');
$columns = get_field('columns');
?>
<section class="title_text_2_col common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
            <?php
            if ($title) {
                ?>
                <div class="col_xl_12">
                    <h2 class="x24 xfont3 bold mgbot30"><?php echo $title ?></h2>
                </div>
            <?php } ?>
            <?php
            if ($columns) {
                foreach ($columns as $c) {
                    if (!$c['textblock']) {
                        continue;
                    }
                    ?>
                    <div class="col_xl_6 col_md_12 col_sm_12 col_xs_12">
                        <div class="user_content">
                            <?php echo $c['textblock']; ?>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
</section>