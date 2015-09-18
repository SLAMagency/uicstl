<?php

//require_once(get_stylesheet_directory_uri().'/library/SLAM/traits/Images.php');


class SlamPost {

	function __construct(&$post) {

		if( gettype($post) != 'object') {

			$post = get_post($post);

		}

		$this->post = $post;

		// Load all meta values as properties.
		$this->load_meta_values();

		// If expiration date is past, change status to draft.
		//$this->expire();
		//
		
		// Set image id
		$this->image_id();

	}


	/**
	 * Sets and returns the attachment id of the featured image
	 * @return integer
	 */
	public function image_id() {
		$this->image = get_post_thumbnail_id( $this->post->ID );
		return $this->image;
	}

	/**
	 * Returns the url to the specified size of the featured image.
	 * @param  size
	 * @return string - url
	 */
	public function image_src($size = 'large') {
		$image = wp_get_attachment_image_src( $this->image, $size );
		return $image[0];
	}

	/**
	 * Returns a simple img html element for hte featured image. 
	 * @param  size
	 * @return html
	 */
	public function image_html($size = 'large') {
		if($this->image) {
			$image = wp_get_attachment_image_src( $this->image, $size );
			return "<img src='{$image[0]}' width='{$image[1]}' height='{$image[2]}' />";
		}
		// } else {
		// 	$image = get_theme_mod('ak_default_image');
		// 	return "<img class='lazy' data-original='{$image}' />";
		// }
	}


	private function load_meta_values() {
		// Load all Meta
		$meta = get_post_meta($this->post->ID);
		$this->meta = $meta;

		foreach ($meta as $key => $value) {

			$key = str_replace("ak_", "", $key);
			$key = str_replace("slam_", "", $key);

			if( is_array($value) && count($value) == 1) {
				$value = $value[0];
			}

			$this->$key = $value; //isset( $inputs[$key] ) ? $inputs[$key] : $default;

		}

		$this->title = $this->post->post_title;
		$this->content = $this->post->post_content;
		$this->permalink = $this->post->guid;

	}

	public function expire() {

		$now = time();

		$future = $this->expiration > $now;

		if(!$future && $this->expiration) {

			$current_post = get_post( $this->ID, 'ARRAY_A' );
		    $current_post['post_status'] = 'draft';
		    wp_update_post($current_post);

		    return true;

		} else {

			return false;

		}

	}

	public function time($format = 'g:i a') {

		return date($format, $this->expiration);

	}

}