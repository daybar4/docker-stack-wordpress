<?php
$show_page_header = get_field('show_page_header');
if ($show_page_header) {
    $page_header_background_image = get_field('page_header_background_image');
    $page_header_title = get_field('page_header_title');
    if (!$page_header_title) {
        $page_header_title = zm_title();
    }
    $page_header_background_color = get_field('page_header_background_color');

    $page_header_description = get_field('page_header_description');
    $page_header_background_image = get_field('page_header_background_image');

    if (!$page_header_background_image) {
        $page_header_background_image = Options::get_fallback('default_page_header_image');
    }

    //@todo image size
    //@todo default page header image size
    ?>
    <div class="hero_module resp_img">
        <?php
        if ($page_header_background_image) {
            echo wp_get_attachment_image($page_header_background_image, 'full', false, array('class' => 'ob_fit_cover'));
            ?>
        <?php } ?>
        <div class="hero_overlay">
            <div class="wrapper h100">
                <div class="row h100 ai_end">
                    <div class="col_xl_12 nogutter">
                        <div class="row mgbot20">
                            <div class="col_xl_12">
                                <h1 class="x46 xfont2 medium_label upper <?php echo $page_header_background_color ?>"><?php echo $page_header_title ?></h1>
                            </div>
                        </div>
                        <?php
                        if ($page_header_description) {
                            ?>
                            <div class="row mgbot20">
                                <div class="col_xl_6 co_md_8 col_sm_8 col_xs_12 xs_nogutter">
                                    <div class="hero_card">
                                        <div class="user_content">
                                            <?php echo $page_header_description ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
$hide_breadcrumbs = get_field('hide_breadcrumbs');
if (!$hide_breadcrumbs) {
    get_template_part('templates/builder/breadcrumbs');
}