<?php

class L {

	public static $domain = 'domain';

	public function __construct() {
		if ( defined( 'ZM_D' ) ) {
			self::$domain = ZM_D;
		}
	}

}

new L();