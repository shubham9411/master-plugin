<?php
/*
Plugin Name: WPMP
Version: 1.0.0
*/
if(!defined('ABSPATH')){
	exit;
}
if(!function_exists('cc_admin_menu_wpmp')){
	function cc_admin_menu_wpmp(){
		add_menu_page('WP MP','Master Plugin','manage_options','wpmp','cc_wpmp_init');	
	}
}
if(!function_exists('cc_wpmp_init')){
	function cc_wpmp_init(){
		include('cc_model.php');
	}
}
if(!function_exists('cc_plugin_setup')){
	function cc_plugin_setup(){
		$option = 'cc_wpmp_plugins';
		$value = '';
		add_option($option,$value,'','');
	}
}
add_action('admin_menu','cc_admin_menu_wpmp');
register_activation_hook(__FILE__,'cc_plugin_setup');
