<?php
$all_plugins = array(
		array(
			'name' => 'Testimonial',
			'description' => 'Manage your Clients testimonials easily',
			'callback' => 'cc_testimonial',
			'status' => 'deactive',
			'slug' => 'edit.php?post_type=testimonial',
			),
		array(
			'name' => 'FAQs',
			'description' => 'Manage Frequently asked questions',
			'callback' => 'cc_faqs',
			'status' => 'deactive',
			'slug' => 'edit.php?post_type=faqs',
			),
		array(
			'name' => 'Links',
			'description' => 'Manage Links to another Website',
			'callback' => 'cc_links',
			'status' => 'deactive',
			'slug' => 'edit.php?post_type=links',
			),
		array(
			'name' => 'Team Management',
			'description' => 'Manage Teams',
			'callback' => 'cc_teams',
			'status' => 'deactive',
			'slug' => 'edit.php?post_type=teams',
			),
		array(
			'name' => 'Gallery',
			'description' => 'Gallery',
			'callback' => 'cc_gallery',
			'status' => 'deactive',
			'slug' => 'edit.php?post_type=gallery',
			),
	);