<?php
$class = 'mgbot30';
if (!$x['textblock'] && !$x['cta_links']) {
    $class = '';
}

$heading = 'h2';
if(isset($x['heading']) && !empty($x['heading'])) {
	$heading = $x['heading'];
}
?>
<div class="previous_editions_module common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <?php
                if ($x['title']) {
                    ?>
                    <<?php echo $heading ?> class="x34 bold xfont2 medium_label upper <?php echo $class ?> <?php echo $x['background_color'] ?>"><?php echo $x['title'] ?></<?php echo $heading?>>
                <?php } ?>
                <?php
                if ($x['textblock']) {
                    ?>
                    <div class="user_content mgbot30">
                        <?php echo $x['textblock']; ?>
                    </div>
                <?php } ?>
                <?php
                if ($x['cta_links']) {
                    ?>
                    <ul class="common_links_list x16 separator">

                        <?php
                        foreach ($x['cta_links'] as $cta) {
                            if ($cta['cta_link']) {
                                echo '<li>' . zm_link($cta['cta_link']) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>