<?php
if (!$x['tabs']) {
    return;
}
?>
<section class="travel_tabs common_module_padding">
    <div class="common_tabs_wrapper">
        <div class="inner_wrapper">
            <div class="row">
                <div class="col_xl_12">
                    <ul class="common_tabs_selector">
                        <?php
                        foreach ($x['tabs'] as $key => $tab) {
                            $class = '';
                            if ($key == 0) {
                                $class = 'active';
                            }
                            ?>
                            <li class="<?php echo $class ?>">
                                <h2>
                                    <button type="button" class="tab_selector btn giant bg_white bc_pink x24 xfont2"><?php echo $tab['tab_title'] ?></button>
                                </h2>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="common_tabs_results_container">
            <div class="row">
                <div class="col_xl_12">
                    <div class="inner_wrapper">
                        <ul class="common_tabs_results">
                            <?php
                            foreach ($x['tabs'] as $key => $tab) {
                                $class = '';
                                if ($key > 0) {
                                    $class = 'dnone';
                                }
                                ?>
                                <li class="tab_container <?php echo $class ?>">
                                    <?php
                                    if ($tab['pagebuilder']) {
                                        do_eye_pagebuilder($tab['pagebuilder']);
                                    }
                                    ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
