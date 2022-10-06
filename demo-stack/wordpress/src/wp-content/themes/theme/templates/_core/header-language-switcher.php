<?php
$languages = icl_get_languages( 'skip_missing=0&order=asc&link_empty_to=' . get_the_permalink() );
if ( ! $languages ) {
	return;
}
?>
<select id="lang_select2" class="lang_select2" onchange="if (this.value) window.location.href=this.value" aria-label="<?php _e( 'Language selector', 'eye' ) ?>">
	<?php
	foreach ( $languages as $l ) {
		$active = '';
		if ( $l['active'] ) {
			$active = 'disabled selected';
		}
		?>
        <option value="<?php echo esc_url( $l['url'] ) ?>" <?php echo $active ?>><?php echo strtoupper( $l['code'] ) . ' - ' . $l['native_name'] ?></option>
		<?php
	}
	?>
</select>
<?php
return;
?>

<div class="mtz lang_selector">
    <!--
    <label for="lang_select" class="hidden_label"><?php _e( 'Language selector collapsed', 'eye' ) ?></label>
    -->
    <div class="input-field">
        <select id="lang_select" onchange="if (this.value) window.location.href=this.value" aria-label="<?php _e( 'Language selector collapsed', 'eye' ) ?>">
			<?php
			foreach ( $languages as $l ) {
				$active = '';
				if ( $l['active'] ) {
					$active = 'disabled selected';
				}
				?>
                <option value="<?php echo esc_url( $l['url'] ) ?>" <?php echo $active ?>><?php echo strtoupper( $l['code'] ) . ' - ' . $l['native_name'] ?></option>
				<?php
			}
			?>
        </select>
        <label for="lang_select"><?php _e( 'Language selector collapsed', 'eye' ) ?></label>
    </div>
</div>