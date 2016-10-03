<?php
/*
Plugin Name: WPMP
Version: 1.0.0
*/
if(!defined('ABSPATH')){
	exit;
}
if(!function_exists('cc_enqueue_wpmp')){
	function cc_enqueue_wpmp() {
		wp_enqueue_script('jquery_js',plugins_url('js/jquery.min.js',__FILE__));
		wp_enqueue_script('cc_wpmp_main',plugins_url('js/main.js',__FILE__));
        wp_localize_script('cc_wpmp_main','ajaxurl_wpmp',admin_url('admin-ajax.php') );
	}
}
include('cc_wpmp_init.php');
add_action('admin_enqueue_scripts','cc_enqueue_wpmp');
add_action('init','cc_activate_features');
add_action('admin_menu','cc_admin_menu_wpmp');
register_activation_hook(__FILE__,'cc_plugin_setup');
add_action('wp_ajax_plugin_activate','cc_update_option');