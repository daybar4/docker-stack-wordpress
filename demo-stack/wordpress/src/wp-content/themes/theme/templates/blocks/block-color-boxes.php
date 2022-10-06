<?php
$color_boxes = get_field('color_boxes');
if (!$color_boxes) {
    return;
}
?>
<section class="card_container common_module_padding">
    <div class="inner_wrapper">
        <ul class="row">
            <?php
            foreach ($color_boxes as $c) {
                $class = 'col_xl_12 col_xs_12';
                switch ($c['box_size']) {
                    case 'full':
                        $class = 'col_xl_12 col_xs_12';
                        break;

                    case 'half':
                        $class = 'col_xl_6 col_xs_12';
                        break;
                }

                $bg_color = $c['background_color'];
                ?>
                <li class="<?php echo $class ?> mgbot50">
                    <div class="colored_card">
                        <header class="card_header mgbot20 <?php echo $bg_color ?>">
                            <div class="card_title_container">
                                <h3>
                                    <?php
                                    if ($c['before_title']) {
                                        ?>
                                        <span class="card_pretitle x34 xfont2 upper mgbot10"><?php echo $c['before_title'] ?></span>
                                        <?php
                                    }
                                    ?>
                                    <span class="card_title x34 xfont2 upper"><?php echo $c['title'] ?></span>
                                </h3>
                            </div>
                        </header>
                        <div class="card_text mgbot15 user_content">
                            <?php echo $c['short_description'] ?>
                        </div>
                        <?php
                        if ($c['cta_link']) {
                            ?>
                            <div class="card_link user_content">
                                <?php
                                echo zm_link($c['cta_link']);
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>