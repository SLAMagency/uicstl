<?php 

	$slider = get_post_meta($post->ID, 'slam_rev_slider', true);
	$featured_image = get_the_post_thumbnail($page->ID, 'featured-image');
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'featured-image' );

	// Custom Padding?
	$image_header_style = '';
	$padding = get_post_meta($post->ID, 'slam_title_padding', true);
	if($padding) {
		$image_header_style = "style='padding: {$padding} inherit;'";
	}

	// Custom Title Color?
	$title_style = '';
	$title_color = get_post_meta($post->ID, 'slam_title_color', true);
	if($title_color) {
		$title_style = "style='color: {$title_color};'";
	}

	$title = get_the_title();

	if ( is_category() && function_exists('get_terms_meta') ) {


		$catID = get_query_var('cat');
		$slider = get_terms_meta($catID, 'slam_rev_slider', true);
		$featured_image = get_terms_meta($catID, 'slam_header_img');
		$post_thumbnail_src = $featured_image; 
		$custom_title = get_terms_meta($catID, 'slam_cat_title', true);

		$title = single_cat_title( '', false);

		if($custom_title) {
			$title = $custom_title;
		}


		if ($slider || $featured_image || $custom_title ) {
			define("IMAGEHEADER", true);
		}


	}
	
	// Return featured image url for given post ID
	function ak_get_featured_image_url($id, $size = 'featured-image') {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
		return $image[0];
	}
	
	if ( is_front_page() && is_home() ) {
	  // Default homepage
	} elseif ( is_front_page() ) {
	  // static homepage
	} elseif ( is_home() ) {
		if ($slider || $featured_image || $custom_title ) {
			define("IMAGEHEADER", true);
		}
		$blog_page_id = get_option('page_for_posts'); // What is the blog page?
		$title = get_page($blog_page_id)->post_title; // Get blog page title
		$thumb_id = get_post_thumbnail_id();
		$featured_image = wp_get_attachment_image_src($thumb_id, 'full-screen'); // Get blog page featured image url
		$post_thumbnail_src = $featured_image; 
	} else {
	  //everything else
	}

	
?>
<div class="slider" style="background-image: url(' <?php echo $post_thumbnail_src[0]; ?> ');">

	<header class="header" role="banner">
	
		<div id="inner-header">
	
			 <?php get_template_part( 'partials/nav', 'offcanvas' ); ?>
	
			 <?php // get_template_part( 'partials/nav', 'topbar' ); ?>
	
			 <?php // get_template_part( 'partials/nav', 'offcanvas-sidebar' ); ?>
	
			<!-- You only need to use one of the above navigations.
				 Offcanvas-sidebar adds a sidebar to a "right" offcanavas menus. -->
	
		</div> <!-- end #inner-header -->
	
	</header> <!-- end header -->

<!-- Include relevant slider for each page -->
<?php 

	if ($slider) {
		echo do_shortcode($slider);
	} elseif($featured_image) {
		?>

		<div class='image-header row' <?php echo $image_header_style; ?> >
		
			<!-- <h1 class="entry-title" <?php echo $title_style; ?> ><?php echo $title; ?></h1> -->
			
		</div>
		<?php
	} else {
		?>
	
		<?php
	}

?>

		<?php 
		if($featured_image && in_category( '11' )) {
			?>
				<style>.image-header { display: none; } .slider { background-image: none !important; } </style>
			<?php
		} elseif ( in_category( 11 )) {
			?>
			<?php
			// etc.
		} else {
			// etc.
		}
		?>
		
		<?php 
		if($featured_image && in_category( '1' )) {
			?>
				<style>.image-header { display: none; } .slider { background-image: none !important; } </style>
			<?php
		} elseif ( in_category( 11 )) {
			?>
			<?php
			// etc.
		} else {
			// etc.
		}
		?>

</div>

<!-- Page Title Bar -->
<div class="page-title-bar">
  <button class="button is-checked" data-filter="*"><h2 class="entry-title" <?php echo $title_style; ?> ><?php echo $title; ?></h2></button>
</div>