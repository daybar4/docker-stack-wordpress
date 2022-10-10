<?php
$title = $x['title'];
$heading = 'h2';
if ( isset( $x['heading'] ) && ! empty( $x['heading'] ) ) {
	$heading = $x['heading'];
}
?>
<section class="title_text_2_col common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
            <?php
            if ($title) {
                ?>
                <div class="col_xl_12">
                    <<?php echo $heading ?> class="x24 xfont3 bold mgbot30"><?php echo $title ?></<?php echo $heading?>>
                </div>
            <?php } ?>

            <div class="col_xl_12 col_md_12 col_sm_12 col_xs_12">
                <div class="text_2_col">
                    <div class="user_content">
                        <?php echo $x['textblock']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>