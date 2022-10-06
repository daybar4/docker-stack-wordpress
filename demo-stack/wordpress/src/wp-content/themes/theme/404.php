<section class="error_404 common_module_padding">
    <div class="row al_center jc_center mgbot50">
        <div class="col_xl_12">
            <p class="xfont4 x34 xs_x24 mgbot5"><?php _e( 'Error 404', 'eye' ) ?></p>
        </div>
    </div>
    <div class="row al_center jc_center error_404_msg common_module_padding">
        <div class="row al_center jc_center">
            <div class="col_xl_12">
                <div class="inner_wrapper">
					<?php echo Options::get_fallback( '404_message' ) ?>
                </div>
            </div>
        </div>
    </div>
</section>