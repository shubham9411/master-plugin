<?php
if( ! function_exists('cc_register_testimonial')){
	function cc_register_testimonial() {
		$labels = array(
			'name' => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new' => 'Add New Testimonial',
			'add_new_item' => 'Add New Testimonial',
			'edit_item' => 'Edit Testimonial',
			'new_item' => 'New Testimonial',
			'view_item' => 'View Testimonial',
			'search_items' => 'Search Testimonials',
			'not_found' => 'No Testimonials found',
			'not_found_in_trash' => 'No Testimonials found in Trash',
			'parent_item_colon' => 'Parent Testimonial:',
			'menu_name' => 'Testimonials',
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Add/Remove Testimonials',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => false,
			'capability_type' => 'post',
			'has_archive' => false,
			'supports' => array(
				'title', 'editor', 'thumbnail'
				)
		);
		register_post_type( 'testimonial', $args );
	}
}
if(!function_exists('cc_testimonial_template')){	
	function cc_testimonial_template() {
		global $wp;
		$plugins = get_option('cc_wpmp_plugins');
		if($plugins[0]['status']=='active'){
			$plugindir = dirname( __FILE__ );
			if ($wp->query_vars != null && $wp->query_vars["pagename"] == 'testimonial') {
				$templatefilename = 'page-testimonial.php';
				if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
					$return_template = TEMPLATEPATH . '/' . $templatefilename;
				}
				else {
					$return_template = $plugindir . '/templates/' . $templatefilename;
				}
				cc_testimonial_redirect($return_template);
			}
			}
	}
}
if(!function_exists('cc_testimonial_redirect')){
	function cc_testimonial_redirect($url) {
		global $post, $wp_query;
		if (have_posts()) {
			include($url);
			die();
		}
		else {
			$wp_query->is_404 = true;
		}
	}
}