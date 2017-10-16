<?php
	// List videos
	function yg_list_videos($atts, $content = null)
	{
		global $post;

		$atts = shortcode_atts([
			'title' => 'Video Gallery',
			'count' => 20,
			'category' => 'all'
		], $atts);

		// Check categories
		if ($atts['category'] == 'all') {
			$terms = '';
		}else{
			$terms = [
				[
					'taxonomy' => 'category',
					'fields' => 'slug',
					'terms' => $atts['category']
				]
			];
		}

		// Query arguments
		$args = [
			'post_type' 		=> 'video',
			'post_status' 		=> 'publish',
			'orderby'			=> 'created',
			'order'				=> 'ASC',
			'posts_per_page' 	=> $atts['count'],
			'tax_query'			=> $terms
		];

		// Fetch videos
		$videos = new WP_Query($args);

		// Check for videos
		if ($videos->have_posts()) {
			$category = str_replace('-', ' ', $atts['category']);
			$output = '';
			$output .= '<div class="video-list">';

				while($videos->have_posts()){
					$videos->the_post();

					// Get field values
					$video_id = get_post_meta($post->ID, 'video_id', true);
					$details = get_post_meta($post->ID, 'details', true);

					$output .= '<div class="yg-video">';
						$output .= '<h4>' . get_the_title() . '</h4>';
						
						if (get_settings('yg_setting_disable_fullscreen')) {
							$output .= '
								<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video_id.'" frameborder="0"></iframe>
							';
						}else{
							$output .= '
								<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video_id.'" frameborder="0" allowfullscreen></iframe>
							';
						}
						$output .= '<div class="details">';
							$details;
						$output .= '</div>';
					$output .= '</div>';
				}
			$output .= '</div>';

			// Reset post data
			wp_reset_postdata();
			return $output;
		}else{
			return '<p>No videos found...</p>';
		}
	}


	// Shortcode
	add_shortcode('videos', 'yg_list_videos');