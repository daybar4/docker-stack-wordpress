<?php
get_template_part('templates/_core/footer-prefooter');
get_template_part('templates/_core/footer-share');

$footer_navigation_menus = Options::get_fallback('footer_navigation_menus');
?>

<footer class="main_footer">
    <div class="wrapper">
        <?php
        if ($footer_navigation_menus) {
            ?>
            <div class="row jc_between">
                <?php
                $i = 1;
                foreach ($footer_navigation_menus as $fm) {
                    $class = 'col_xl_4';
                    if ($i % 2) {
                        $class = 'col_xl_3';
                    }
                    $i++;
                    ?>
                    <div class="<?php echo $class ?> col_sm_12 col_xs_12 sm_al_center xs_al_center vlinks_container">
                        <?php
                        if ($fm['menu_title']) {
                            ?>
                            <p class="x20 white xfont4 mgbot30"><?php echo $fm['menu_title'] ?></p>
                        <?php } else { ?>
                            <p class="x20 white xfont4 mgbot30"></p>
                        <?php } ?>
                        <?php
                        if ($fm['subtitle']) {
                            ?>
                            <p class="x14 grey2 bold mgbot10"><?php echo $fm['subtitle'] ?></p>
                        <?php } ?>
                        <?php
                        if ($fm['menu']) {

                            $args = array(
                                'echo' => true,
                                'menu' => $fm['menu'],
                                'menu_class' => 'x14 white footer_vlinks',
                            );
                            wp_nav_menu($args);
                        }
                        ?>
                        <button class="ep_footer-separator dnone w100 trigger_vlinks sm_show xs_show"><span class="ico_plus x16"></span></button>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <span class="ep_footer-separator dblock sm_none xs_none"></span>

        <div class="row expand ai_center">
            <div class="col_xl_12 al_center mgbot30">
                <div class="ep_sociallinks" id="socialmedia">
                    <div class="ep_list">

                        <?php
                        $footer_social_icons = Options::get_fallback('footer_social_icons');
                        if ($footer_social_icons) {
                            //debugP($footer_social_icons);
                            ?>
                            <ul>
                                <?php
                                foreach ($footer_social_icons as $fs) {
                                    if (!$fs['cta_link']) {
                                        continue;
                                    }

                                    $class = '';
                                    switch ($fs['type']) {
                                        case 'facebook':
                                            $class = 'ep_facebook';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Facebook</span><span class="ep_icon"></span>';
                                            break;
                                        case 'twitter':
                                            $class = 'ep_twitter';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Twitter</span><span class="ep_icon"></span>';
                                            break;
                                        case 'flickr':
                                            $class = 'ep_flickr';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Flickr</span><span class="ep_icon"></span>';
                                            break;
                                        case 'linkedin':
                                            $class = 'ep_linkedin';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Linkedin</span><span class="ep_icon"></span>';
                                            break;
                                        case 'youtube':
                                            $class = 'ep_youtube';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Youtube</span><span class="ep_icon"></span>';
                                            break;
                                        case 'instagram':
                                            $class = 'ep_instagram';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Instagram</span><span class="ep_icon"></span>';
                                            break;
                                        case 'pinterest':
                                            $class = 'ep_pinterest';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Pinterest</span><span class="ep_icon"></span>';
                                            break;
                                        case 'snapchat':
                                            $class = 'ep_snapchat';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Snapchat</span><span class="ep_icon"></span>';
                                            break;
                                        case 'reddit':
                                            $class = 'ep_reddit';
                                            $fs['cta_link']['title'] = '<span class="ep_name">Reddit</span><span class="ep_icon"></span>';
                                            break;
                                    }

                                    ?>
                                    <li class="ep_item">
                                        <?php echo zm_link($fs['cta_link'], 'ep_button ' . $class) ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="col_xl_12 al_center">
                <?php
                if (has_nav_menu('footer_navigation')) :
                    wp_nav_menu(array(
                        'theme_location' => 'footer_navigation',
                        'walker' => new Zm_Nav_Walker(),
                        'menu_class' => 'x12 white footer_hlinks'
                    ));
                endif;
                ?>
            </div>
        </div>

    </div>
</footer>