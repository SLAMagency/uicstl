<?php namespace SLAM; 
/*
	Section Class
*/


class Section {

	public $background_image;
	public $background_color;
	public $padding;
	public $class;

	public function __construct($input) {

		// Accept input as array of key => value pairs
		if( is_array($input) ) {

			foreach($input as $key => $value ) {
				$this->$key = $value;
			}

		} elseif( is_object($input) ) { // Accept input as post object

			$this->post = $input;

			$this->get_values_from_meta($this->post->ID);

			$this->title = $this->post->title;

		}	elseif( is_integer($input) ) { // Accept input as post id

			$this->get_values_from_meta($input);

		}

	}

	private function get_values_from_meta($id) {

		$this->meta = get_post_meta($id);

		foreach ($this->meta as $key => $value) {

			$key = str_replace("slam_", "", $key);

			if( is_array($value) && count($value) == 1) {
				$value = $value[0];
			}

			$this->$key = $value; //isset( $inputs[$key] ) ? $inputs[$key] : $default;

		}

	}

	private function get_section_classes() {
		$classes = array();
		$classes[] = 'slam_section';
		$classes[] = 'parallax__group';
		$classes[] = $this->additional_classes;
		$classes[] = 'bg-' . $this->background_color;
		//$classes[] = 'bg-' . $this->background_color;
		//$classes[] = $this->padding;
		//$classes[] = $this->content_width;
		$classes[] = $this->_wp_page_template . '-template';
		if($this->background_image) {
			$classes[] = 'no-overflow';
		}

		return implode(' ', $classes);
	}

	private function get_content_classes() {
		$classes = array();
		$classes[] = 'slam_section_content';
		$classes[] = 'parallax__layer';
		$classes[] = 'parallax__layer--base';
		
		$classes[] = $this->padding;
		$classes[] = $this->content_width;

		return implode(' ', $classes);
	}

	private function get_image($id, $size = 'full') {
		$image = wp_get_attachment_image_src( $id, $size );
		return $image[0];
	}

	public function build() {
		
		echo "<section id='{$this->post->post_name}' class='{$this->get_section_classes()}'>";

			if($this->background_image) {
				//echo "<img src='{$this->get_image($this->background_image)}' class='section-background-image parallax__layer parallax__layer--back section_background_image section_background_img {$this->image_opacity}' />";
				echo "<div style='background-image: url({$this->get_image($this->background_image)})' class='section_background_image section_background_div {$this->image_opacity}'></div>";

			}

			if($this->post->post_content) {
				echo "<div class='{$this->get_content_classes()} clearfix'>";
				if($this->content_width != 'fullwidth') {
					echo "<div class='row'>";
						echo "<div class='columns small-12'>"; 
				}
							echo do_shortcode( $this->post->post_content );
				if($this->content_width != 'fullwidth') {
						echo "</div>";
					echo "</div>";
				}
				echo "</div>";
			}

			// echo "<pre>";
			// print_r($this->post);
			// echo "</pre>";

		echo "</section>";

	}

}