<?php
function options_validator_metabox() {
	if (function_exists('add_meta_box')) {
		add_meta_box('meta-box-id', __('Language validator', 'textdomain'), 'options_validator_box', 'acf_options_page', 'side');
	}
}

add_action('acf/input/admin_head', 'options_validator_metabox', 10);

function options_validator_box() {
	?>
	<div id="options_language_content">
		Current language: <strong><?php echo strtoupper(ICL_LANGUAGE_CODE) ?></strong>
	</div>
	<a href="" id="options_language_content_refresh" class="button button-primary button-large" style="margin-top: 10px;">Validate language</a>

	<script>
		(function ($) {
			$(document).ready(function () {
				$('#options_language_content_refresh').on('click', function (e) {

					$.ajax({
						//cache: false,
						data: {
							action: 'options_language_check_action',
							language: '<?php echo ICL_LANGUAGE_CODE?>',
						},
						type: 'post',
						url: ajaxurl,
						beforeSend: function (xhr) {
							$('#options_language_content').html('Loading');
						},
						success: function (data) {
							$('#options_language_content').html(data);
						}
					});

					e.preventDefault();
				});
			});
		})(jQuery);
	</script>

	<?php
}

add_action('wp_ajax_options_language_check_action', 'options_language_check_action');
add_action('wp_ajax_nopriv_options_language_check_action', 'options_language_check_action');

function options_language_check_action() {

	if (!isset($_POST['language'])) {
		$_POST['language'] = ICL_LANGUAGE_CODE;
	}

	$status = false;
	if (ICL_LANGUAGE_CODE == sanitize_title($_POST['language'])) {
		$status = true;
	}

	?>
	<span style="color: green">Refresh done!</span>
	<div>
		Expected language: <strong><?php echo strtoupper($_POST['language']) ?></strong>
	</div>
	<div>
		Real language: <strong><?php echo strtoupper(ICL_LANGUAGE_CODE) ?></strong>
	</div>
	<div>
		Result:
		<?php
		if ($status) {
			#green
			?>
			<span style="color: green"><b>OK</b></span>
			<?php
		} else {
			?>
			<span style="color: red"><b>PROBLEM!</b></span>
			<?php
		}
		?>

	</div>
	<?php
	die();
}