<?php
/*
*	Plugin name: YouTube Video Gallery
*	Plugin URI: http://www.iodevllc.com
*	Description: Embed YouTube videos to your WordPress website.
* 	Version: 0.1 beta
*	Author:	Mher Margaryan
*	Author URI: http://www.iodevllc.com
*/

// Exit if direct
if (!defined('ABSPATH')) {
	exit('You are not allowed to be here.');
}

// Require scripts
require_once(plugin_dir_path(__FILE__) . '/includes/youtube-gallery-scripts.php');

// Require shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/youtube-gallery-shortcodes.php');

// Only if admin
if (is_admin()) {

	// Require Custom Post Type
	require_once(plugin_dir_path(__FILE__) . '/includes/youtube-gallery-cpt.php');
	
	// Require fields
	require_once(plugin_dir_path(__FILE__) . '/includes/youtube-gallery-fields.php');
	
	// Require settings
	require_once(plugin_dir_path(__FILE__) . '/includes/youtube-gallery-settings.php');
	
}