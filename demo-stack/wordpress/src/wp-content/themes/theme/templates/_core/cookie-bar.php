<?php
$cookie_bar_text = Options::get("cookie_bar_text");
$cookie_bar_button_text = Options::get("cookie_bar_button_text");

if (!$cookie_bar_button_text || !$cookie_bar_text) {
	return;
}
?>
<div class="cookie__bar">
	<div class="cookie__bar__text">
		<?php echo str_replace(["<p>", "</p>"], ["", ""], $cookie_bar_text); ?>
	</div>
	<div class="cookie__bar__btn">
		<a href="javascript:void(0);" title="<?php echo esc_attr($cookie_bar_button_text) ?>" class="btn">
			<?php echo $cookie_bar_button_text ?>
		</a>
	</div>
</div>