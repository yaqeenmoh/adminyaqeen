<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('general_assets')) {
	function general_assets($url = '')
	{
		return base_url('assets/lib/assets/' . $url);
	}
}

if (!function_exists('general_app_assets')) {
	function general_app_assets($url = '')
	{
		return base_url('assets/lib/app-assets/' . $url);
	}
}

if (!function_exists('check_language')) {
	function check_language()
	{
		$ci =& get_instance();
		return $ci->session->userdata('site_lang');

	}
}


if (!function_exists('_lang')) {
	function _lange()
	{
		$ci =& get_instance();
		$lang= $ci->session->userdata('site_lang');
		if ($lang=='arabic'){
			return 'ar';
		}else{
			return 'en';
		}

	}
}







