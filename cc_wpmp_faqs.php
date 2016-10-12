<?php 
if( ! function_exists('cc_register_faq')){
	function cc_register_faq() {
		$labels = array(
			'name' => 'FAQs',
			'singular_name' => 'FAQ',
			'add_new' => 'Add New FAQ',
			'add_new_item' => 'Add New FAQ',
			'edit_item' => 'Edit FAQ',
			'new_item' => 'New FAQ',
			'view_item' => 'View FAQ',
			'search_items' => 'Search FAQs',
			'not_found' => 'No FAQs found',
			'not_found_in_trash' => 'No FAQs found in Trash',
			'parent_item_colon' => 'Parent FAQ:',
			'menu_name' => 'FAQs',
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Add/Remove FAQs',
			'public' => true,
			'show_in_menu' => false,
			'capability_type' => 'post',
			'has_archive' => false,
			'supports' => array(
				'title', 'editor',
				)
		);
		register_post_type( 'faq', $args );
	}
}