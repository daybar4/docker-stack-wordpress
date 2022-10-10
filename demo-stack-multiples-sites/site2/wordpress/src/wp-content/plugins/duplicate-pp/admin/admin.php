<?php
/**
 * Admin Support Page
*/

class DPP_Admin_Page {
    /**
     * Contructor
    */
    public function __construct(){
        add_action( 'admin_menu', [ $this, 'dpp_plugin_admin_page' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'dpp_admin_page_assets' ] );
    }

    // Admin Assets
    public function dpp_admin_page_assets($screen) {
        if( 'tools_page_duplicate-pp' == $screen ) {
            wp_enqueue_style( 'admin-asset', plugins_url('assets/css/admin.css', __FILE__ ) );
        }
    }

    // Admin Notice 
    public function dpp_admin_notices(){
            if ( !( isset($_COOKIE['dpp-notice']) && $_COOKIE['dpp-notice'] ==1 )) :
        ?>
            <div class="notice notice-success is-dismissible" id="dpp-notice">
                <h4>Thanks for using <strong>Duplicate PP</strong>. Please <a target="_blank" rel="nofollow noreferrer" href="<?php echo esc_url('https://wordpress.org/plugins/duplicate-pp/#reviews'); ?>">Rate Duplicate PP</a> and <a target="_blank" rel="nofollow noreferrer" href="<?php echo esc_url('https://www.patreon.com/dev_zak'); ?>">Donate Me</a></h4>
            </div>
        <?php
            endif;
    } 

    // Admin Page
    public function dpp_plugin_admin_page(){
        add_submenu_page( 'tools.php', __('Duplicate PP','duplicate-pp'), __('Duplicate PP','duplicate-pp'), 'manage_options', 'duplicate-pp', [ $this, 'dpp_admin_page_content_callback' ] );
    }
    public function dpp_admin_page_content_callback(){
        ?>
            <div class="admin_page_container">
                <div class="plugin_head">
                    <div class="head_container">
                        <h1 class="plugin_title"> <?php echo esc_html("Duplicate PP", "duplicate-pp"); ?> </h1>
                        <h4 class="plugin_subtitle"><?php echo esc_html("A Light-weight Plugin to Duplicate Any Post Type", "duplicate-pp"); ?></h4>
                        <div class="support_btn">
                            <a href="https://www.patreon.com/dev_zak" target="_blank" rel="nofollow noreferrer" style="background: #EA4335"><?php echo esc_html("Donate Me", "duplicate-pp"); ?></a>
                            <a href="https://makegutenblock.com/contact" target="_blank" rel="nofollow noreferrer" style="background: #D37F00"><?php echo esc_html("Get Support", "duplicate-pp"); ?></a>
                            <a href="https://wordpress.org/plugins/duplicate-pp/#reviews" target="_blank" rel="nofollow noreferrer" style="background: #0174A2"><?php echo esc_html("Rate Plugin", "duplicate-pp"); ?></a>
                        </div>
                    </div>
                </div>
                <div class="plugin_body">
                    <div class="doc_video_area">
                        <div class="doc_video">
                          <img src="<?php echo plugin_dir_url(__FILE__); ?>../img/dpp.jpg">
                        </div>
                    </div>
                    <div class="support_area">
                        <div class="single_support">
                            <h4 class="support_title"><?php echo esc_html("Freelance Work", "duplicate-pp"); ?></h4>
                            <div class="support_btn">
                                <a href="https://www.fiverr.com/users/devs_zak/" target="_blank" rel="nofollow noreferrer" style="background: #1DBF73"><?php echo esc_html("@Fiverr", "duplicate-pp"); ?></a>
                                <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" target="_blank" rel="nofollow noreferrer" style="background: #14A800"><?php echo esc_html("@UpWork", "duplicate-pp"); ?></a>
                            </div>
                        </div>
                        <div class="single_support">
                            <h4 class="support_title"><?php echo esc_html("Get Support", "duplicate-pp"); ?></h4>
                            <div class="support_btn">
                                <a href="https://makegutenblock.com/contact" target="_blank" rel="nofollow noreferrer" style="background: #002B42"><?php echo esc_html("Contact", "duplicate-pp"); ?></a>
                                <a href="mailto:zbinsaifullah@gmail.com" style="background: #EA4335"><?php echo esc_html("Send Mail", "duplicate-pp"); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
 new DPP_Admin_Page();
