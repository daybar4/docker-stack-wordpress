<?php
/**
 * Core base file
 *
 * @author ZoneMedia Digital
 */

do_action( 'custom_before_header' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'templates/_core/head' ); ?>
<body dir="ltr">
<div class="page_wrapper">

	<?php do_action( 'get_header' ); ?>
	<?php get_template_part( 'templates/_core/header' ); ?>

    <main id="main-content">
        <!-- test comment -->
		<?php include roots_template_path(); ?>
    </main>

	<?php do_action( 'get_footer' ); ?>
	<?php get_template_part( 'templates/_core/footer' ); ?>
	<?php get_template_part( 'templates/_core/cookie-bar' ); ?>
</div>
<?php wp_footer(); ?>
<script>
    (function ($) {
        $(document).ready(function () {
            add_target_blank_to_external_links();
        });

        function add_target_blank_to_external_links() {
            $('a').each(function () {
                if ($(this).attr('target') == '_blank') {
                    $(this).attr('rel', 'noopener noreferrer');
                }
            });
        }
    })(jQuery);
</script>
</body>
</html>