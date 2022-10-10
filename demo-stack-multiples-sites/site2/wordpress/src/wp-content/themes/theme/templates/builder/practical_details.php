<?php
if (!$x['practical_details']) {
    return;
}
?>

<section class="practical_details_module common_module_padding">
    <div class="inner_wrapper">
        <?php
        foreach ($x['practical_details'] as $row_key => $row) {
            if (!$row['items'] || empty($row['items'])) {
                continue;
            }
            ?>
            <div class="row">
                <?php
                foreach ($row['items'] as $item_key => $item) {
                    $class = 'col_xl_6 col_xs_12 mgbot50';
                    switch ($item['width']) {
                        case 'full':
                            $class = 'col_xl_12 mgbot50';
                            break;

                        case 'half':
                        default:
                            $class = 'col_xl_6 col_xs_12 mgbot50';
                    }
                    ?>
                    <div class="<?php echo $class ?>">
                        <h2 class="x36 xfont2 upper mgbot10"><?php echo $item['title'] ?></h2>
                        <div class="user_content mgbot30">
                            <?php echo $item['description'] ?>
                        </div>
                        <?php
                        if ($item['cta_links']) {
                            foreach ($item['cta_links'] as $key => $cta_link) {
                                if (!$cta_link['cta_link']) {
                                    continue;
                                }
                                $cl = '';
                                if (($key + 1) !== count($item['cta_links'])) {
                                    $cl = 'mgbot20';
                                }

                                $cl .= ' ' . $cta_link['background_color'];
                                echo zm_link($cta_link['cta_link'], 'btn giant x24 xfont2 black upper dblock ' . $cl);
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            if (($row_key + 1) !== count($x['practical_details'])) {
                ?>
                <hr class="mgbot30 xs_none">
                <?php
            }
        }
        ?>
    </div>
</section>
