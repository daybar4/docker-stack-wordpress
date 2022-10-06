<?php
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations['primary_navigation']);
//$menuitems = wp_get_nav_menu_items($menu->term_id);

$menuitems = wp_get_menu_array($menu->term_id);

if (!$menuitems) {
    return;
}

//debugP($menuitems);
?>

<ul class="row">
    <?php
    foreach ($menuitems as $key => $item) {
        $class = '';
        if ($item['current']) {
            $class = 'active';
        }
        ?>
        <li class="<?php echo $class ?>">
            <?php
            if ($item['children'] && !empty($item['children'])) {
                $id = 'dropdown-' . sanitize_title($item['title']) . rand(0, 1000);
                ?>
                <div class="mtz">
                    <a href="<?php echo $item['url'] ?>" title="<?php echo $item['title'] ?>" data-target="<?php echo $id ?>" class="dropdown-trigger default_dropdown main_menu_dropdown_trigger"><?php echo $item['title'] ?> <span class="ico_down x12"></span></a>
                    <ul class="dropdown-content main_menu_dropdown" id="<?php echo $id ?>">
                        <?php
                        foreach ($item['children'] as $child) {
                            $class = '';
                            if ($child['current']) {
                                $class = 'active';
                            }
                            ?>
                            <li class="<?php echo $class ?>"><a href="<?php echo $child['url'] ?>" title="<?php echo $child['title'] ?>"><?php echo $child['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php
            } else {
                ?>
                <a href="<?php echo $item['url'] ?>" title="<?php echo $item['title'] ?>"><?php echo $item['title'] ?></a>
            <?php } ?>
        </li>
        <?php
    }
    ?>
</ul>
