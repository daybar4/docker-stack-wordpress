<?php
$title = $x['page_title'];
if (!$title) {
    $title = zm_title();
}
?>
<div class="common_page_title">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <h1 class="x34 bold xfont3"><?php echo $title ?></h1>
            </div>
        </div>
    </div>
</div>