<?php
/*
Plugin Name: WPMP
Version: 1.0.0
*/
if(!defined('ABSPATH')){
	exit;
}
include('cc_wpmp_init.php');
add_action('admin_enqueue_scripts','cc_enqueue_wpmp');
add_action('init','cc_activate_features');
add_action('admin_menu','cc_admin_menu_wpmp');
register_activation_hook(__FILE__,'cc_plugin_setup');
add_action('wp_ajax_plugin_activate','cc_update_option');
add_action('cc_testimonial','');
add_action('cc_faqs','');
add_action('cc_team','');
add_action('cc_links','');
add_action('cc_gallery','');