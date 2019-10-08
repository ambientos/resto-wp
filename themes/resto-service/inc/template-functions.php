<?php

/**
 * Return raw phone
 */

function resto_get_phone_raw( $phone = false ){
	if ( $phone )
		return str_replace('(', '', str_replace(')', '', str_replace('-', '', str_replace(' ', '', $phone) ) ) );
}


/**
 * Check for show advertisement
 */

function resto_is_show_ad(){
	$is_show_ad = get_option( 'resto_ad_show', false );

	return $is_show_ad;
}