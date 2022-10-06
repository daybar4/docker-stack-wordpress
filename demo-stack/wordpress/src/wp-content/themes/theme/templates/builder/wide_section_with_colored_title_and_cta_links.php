<?php
//NOT BEING USED ANYMORE
?>
<div class="beyond_eye_module common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <?php
                if ($x['title']) {
                    ?>
                    <h2 class="x34 bold xfont2 medium_label upper mgbot30 <?php echo $x['background_color'] ?>"><?php echo $x['title'] ?></h2>
                <?php } ?>
                <div class="user_content mgbot30">
                    <?php echo $x['text_content'] ?>
                </div>
                <?php
                if ($x['cta_links']) {
                    ?>
                    <ul class="common_links_list x16 separator">
                        <?php
                        foreach ($x['cta_links'] as $l) {
                            if ($l['cta_link']) {
                                echo '<li>' . zm_link($l['cta_link']) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>