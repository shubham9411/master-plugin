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