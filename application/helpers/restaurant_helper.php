<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');




if (! function_exists('restaurant_css')) {
	function restaurant_css($url='')
	{
		return  base_url('assets/restaurant/css/'.$url);
	}
}

if (! function_exists('restaurant_js')) {
	function restaurant_js($url='')
	{
		return  base_url('assets/restaurant/js/'.$url);
	}
}

if (! function_exists('restaurant_uploads')) {
	function restaurant_uploads($url='')
	{
		return  base_url('assets/restaurant/uploads/'.$url);
	}
}

if (! function_exists('restaurant_avatar')) {
	function restaurant_avatar($url='')
	{
		return  base_url('assets/restaurant/avatar/'.$url);
	}
}

if (! function_exists('rest_path')) {
	function rest_path($url='')
	{
		return  'restaurant/'.$url;
	}


}
