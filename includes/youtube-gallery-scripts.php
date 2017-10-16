<?php
	
	function yg_admin_scripts_enqueue()
	{
		if (is_admin()) {
			wp_enqueue_style('yg-admin-stylesheet', plugins_url() . '/youtube-gallery/css/styles-admin.css');
		}
	}
	add_action('admin_init', 'yg_admin_scripts_enqueue');

	function yg_scripts_enqueue()
	{
		wp_enqueue_style('yg-main-stylesheet', plugins_url() . '/youtube-gallery/css/styles.css');
		wp_enqueue_script('yg-main-javascript', plugins_url() . '/youtube-gallery/js/main.js', ['jquery']);
	}
	add_action('wp_enqueue_scripts', 'yg_scripts_enqueue');