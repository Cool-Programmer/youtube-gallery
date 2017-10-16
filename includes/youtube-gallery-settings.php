<?php
	function yg_settings_api_init()
	{
		add_settings_section(
			'yg_settings_section',
			'YouTube Video Gallery Settings',
			'yg_setting_section_callback',
			'reading'
		);

		add_settings_field(
			'yg_setting_disable_fullscreen',
			'Disable Fullscreen',
			'yg_setting_disable_fullscreen_callback',
			'reading',
			'yg_settings_section'
		);

		register_setting('reading', 'yg_setting_disable_fullscreen');
	}

	add_action('admin_init', 'yg_settings_api_init');

	
	function yg_setting_section_callback()
	{
		echo '<p>Settings for YouTube Video Gallery</p>';
	}

	function yg_setting_disable_fullscreen_callback()
	{
		echo '<input type="checkbox" name="yg_setting_disable_fullscreen" id="yg_setting_disable_fullscreen" value="1" class="code"' . checked(1, get_option('yg_setting_disable_fullscreen'), false); 
	}