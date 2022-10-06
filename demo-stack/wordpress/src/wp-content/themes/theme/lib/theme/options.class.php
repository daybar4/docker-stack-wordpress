<?php

/**
 * Options class
 *
 * usage: Options::get('name_of_option');
 *
 * @version 1.0.0
 * @link https://www.advancedcustomfields.com/resources/options-page/
 * @author Jan Horecny <horecny@zonemedia.sk>
 */
Class Options {

	public function __construct() {
	}

	/**
	 * Returns Option value from given language
	 ***
	 *
	 * @param bool $name option key name
	 * @param bool $language language, default is current language
	 *
	 * @return mixed|null
	 */
	public static function get( $name = false, $language = false ) {
		if ( defined( 'ICL_LANGUAGE_CODE' ) && $language && $language !== ICL_LANGUAGE_CODE ) {
			return get_field( $name, 'options_' . $language );
		} else {
			return get_field( $name, 'option' );
		}
	}

	/**
	 * Returns Option value from default language
	 *
	 * @param $name string Option key name
	 *
	 * @return mixed|null
	 */
	public static function get_default( $name ) {
		add_filter( 'acf/settings/current_language', 'cl_acf_set_language', 100 );
		$option = get_field( $name, 'option' );
		remove_filter( 'acf/settings/current_language', 'cl_acf_set_language', 100 );

		return $option;
	}

	/**
	 * Returns Option value from current language, if it does not exists, returns from default instead
	 *
	 * @param $name string Option key name
	 *
	 * @return mixed|null
	 */
	public static function get_fallback( $name ) {
		$value = self::get( $name );
		if ( ! $value ) {
			$value = self::get_default( $name );
		}

		return $value;
	}

}

function cl_acf_set_language() {
	return acf_get_setting( 'default_language' );
}

new Options();
