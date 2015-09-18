<?php
/*
Template Name: Parent
*/
?>

<?php get_header(); ?>
			
			

			<?php 

	    		$section = new SLAM\Section($post);
	    		$section->build();

	    		//Load Child Pages
	    		$args = array(
	    			'post_parent' 	=> $post->ID,
	    			'post_type'		=> 'page',
	    			'orderby'		=> 'menu_order',
	    			'order'			=> 'ASC'
	    		);

	    		$children = get_children($args);

	    		foreach($children as $child) {
	    			$section = new SLAM\Section($child);
	    			$section->build();
	    		}


	    	?>
			


<?php get_footer(); ?>
