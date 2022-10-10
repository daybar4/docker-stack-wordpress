<?php
$header_logo = Options::get_fallback( 'header_logo' );
if ( ! $header_logo ) {
	$header_logo = get_template_directory_uri() . '/dist/img/euro_logo.png';
}

$header_logo_link = Options::get_fallback( 'header_logo_link' );

$header_primary_link_cta   = Options::get_fallback( 'header_primary_link_cta' );
$header_secundary_link_cta = Options::get_fallback( 'header_secundary_link_cta' );

$header_logo_alt_title = Options::get_fallback( 'header_logo_alt_title' );
?>
<header class="main_header">
    <a class="skip_to_main" href="#main-content" title="<?php _e( 'Skip to main content', 'eye' ) ?>"><?php _e( 'Skip to main content', 'eye' ) ?></a>

    <div class="top_bar">
        <div class="wrapper">
            <div class="row ai_center">
                <div class="col_xl_2 col_sm_6 col_xs_6 xs_nogutter">
					<?php
					get_template_part( 'templates/_core/header-language-switcher' );
					?>
                </div>
                <div class="col_xl_10 col_sm_6 col_xs_6 nogutter al_right">
					<?php
					get_template_part( 'templates/_core/header-top-small-navigation' );
					?>
                </div>
            </div>
        </div>
    </div>
    <div class="logo_bar">
        <div class="wrapper">
            <div class="row">
                <div class="col_xl_12">
					<?php
					if ( $header_logo_link ) {
						if ( ! $header_logo_alt_title ) {
							$header_logo_alt_title = $header_logo_link['title'];
						}

						$target = '';
						if ( $header_logo_link['target'] ) {
							$target = 'target="' . $header_logo_link['target'] . '"';
						}
						?>
                        <a class="dinblock vmid" href="<?php echo $header_logo_link['url'] ?>" title="<?php echo $header_logo_link['title'] ?>" <?php echo $target ?>>
                            <img src="<?php echo $header_logo ?>" alt="<?php echo $header_logo_alt_title ?>">
                        </a>
						<?php
					} else {
						?>
                        <img src="<?php echo $header_logo ?>" alt="<?php echo $header_logo_alt_title ?>">
						<?php
					}
					?>
                    <div class="v_sep dinblock vmid">
						<?php
						if ( $header_primary_link_cta ) {
							echo zm_link( $header_primary_link_cta, 'dblock xfont4 x24 xs_x19 mgbot5' );
						}
						if ( $header_secundary_link_cta ) {
							echo zm_link( $header_secundary_link_cta, 'dblock x14' );
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu_bar sticky_header">
        <div class="wrapper">
            <div class="row">
                <div class="col_xl_12">
                    <div class="sticky_header_text al_center xs_al_left dnone">
                        <p class="x24 xfont4 white xs_none">European Parliament</p>
                        <img src="<?php echo get_template_directory_uri() ?>/dist/img/euro_logo_white.png" alt="<?php echo $header_logo_alt_title ?>" class="resp_img dnone xs_show">
                    </div>
                    <button type="button" class="main_menu_trigger x12 white dnone md_show sm_show xs_show"><span class="dinblock vmid"><?php _e( 'MENU', 'eye' ) ?></span> <span class="ico_burger btn_ico x20 white dinblock vmid"></span></button>
                    <nav aria-label="<?php _e( 'main menu', 'eye' ) ?>" class="main_menu md_none sm_none xs_none">
						<?php
						get_template_part( 'templates/_core/header-main-menu' );
						?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>