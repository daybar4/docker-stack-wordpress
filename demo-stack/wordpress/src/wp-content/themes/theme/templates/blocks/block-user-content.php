<?php
$text_content = get_field('text_content');
if (!$text_content) {
    return;
}

?>
<div class="user_content_container pdtop30">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <div class="user_content">
                    <?php
                    echo $text_content;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>