<?php
	// Create custom post type
	function yg_register_video()
	{
		$singular_name = apply_filters('yg_label_single', 'Video');
		$plural_name = apply_filters('yg_label_plural', 'Videos');

		$labels = [
			'name' 			=> $plural_name,
			'singular_name' => $singular_name,
			'add_new' 		=> 'Add New',
			'add_new_item' 	=> 'Add New ' . $singular_name,
			'edit' 			=> 'Edit', 
			'edit_item' 	=> 'Edit ' . $singular_name,
			'new_item' 		=> 'New ' . $singular_name,
			'view' 			=> 'View',
			'view_item' 	=> 'View ' . $singular_name,
			'search_items' 	=> 'Search ' . $plural_name,
			'not_found' 	=> 'No ' . $plural_name . ' Found',
			'menu_name' 	=> $plural_name
		];

		$args = apply_filters('yg_args',[
			'labels' => $labels,
			'description' => 'Videos by Category',
			'taxonomies' => ['category'],
			'public' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-video-alt',
			'show_in_nav_menus' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => ['slug' => 'video'],
			'capability_type' => 'post',
			'supports' => ['title']
		]);

		// Register post type
		register_post_type('video', $args);
	}

	add_action('init', 'yg_register_video');