<?php
if( ! function_exists('cc_wpmp_register_gallery')){
	function cc_wpmp_register_gallery() {
		$labels = array(
			'name' => 'Gallary',
			'singular_name' => 'Gallary',
			'add_new' => 'Add New Image',
			'add_new_item' => 'Add New Image',
			'edit_item' => 'Edit Image',
			'new_item' => 'New Image',
			'view_item' => 'View Image',
			'search_items' => 'Search Image',
			'not_found' => 'No Image found',
			'not_found_in_trash' => 'No Image found in Trash',
			'parent_item_colon' => 'Parent Image:',
			'menu_name' => 'Gallary',
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Add/Remove Image',
			'public' => true,
			'show_in_menu' => false,
			'capability_type' => 'post',
			'has_archive' => false,
			'supports' => array(
				'title', 'thumbnail',
				)
		);
		register_post_type( 'gallery', $args );
	}
}