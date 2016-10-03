<?php
/*
Plugin Name: WPMP
Version: 1.0.0
*/
if(!defined('ABSPATH')){
	exit;
}
include('cc_wpmp_init.php');
include('cc_wpmp_testimonial.php');
include('cc_wpmp_faqs.php');
include('cc_wpmp_links.php');
include('cc_wpmp_teams.php');
// include('cc_wpmp_gallery.php');
add_action('admin_enqueue_scripts','cc_wpmp_enqueue');
add_action('wp_enqueue_scripts','cc_wpmp_enqueue_no_priv');
add_action('init','cc_activate_features');
add_action('admin_menu','cc_admin_menu_wpmp');
register_activation_hook(__FILE__,'cc_plugin_setup');
add_action('wp_ajax_plugin_activate','cc_update_option');
add_filter('enter_title_here','cc_wpmp_title');
add_action('cc_testimonial','cc_register_testimonial');
add_action('template_redirect','cc_wpmp_template');
add_action('cc_faqs','cc_register_faq');
add_action('cc_teams','cc_wpmp_register_teams');
add_action('cc_links','cc_wpmp_register_links');
add_action('save_post','cc_link_save');
add_action('save_post','cc_team_save');

add_action('add_meta_boxes','cc_add_link_metabox');
add_action('add_meta_boxes','cc_create_team_metabox');


// add_action('cc_gallery','');