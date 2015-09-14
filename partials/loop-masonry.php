<div <?php post_class( 'isotope-item clearfix' ); ?>>

	<!-- HTML5 Option -->
	<?php 
	
/*
	$slam_featured_video = get_post_meta( get_the_ID(), 'meta-image', true );
	
	if (!empty($slam_featured_video))  {
		echo '<video controls="controls" preload="auto" width="100%" height="100%">
		<source src="'. $slam_featured_video. '" type="video/mp4" />
		</video>';
	} elseif (empty($slam_featured_video)) {
	    echo the_post_thumbnail('full');
	}
*/

	?>
	
	<!-- YouTube or Vimeo Option -->
	<?php 
	
	$slam_featured_video = get_post_meta( get_the_ID(), 'meta-image', true );
	
	if (!empty($slam_featured_video))  {
		echo '<div class="flex-video vimeo widescreen"><iframe src="'. $slam_featured_video. '?controls=0&showinfo=0" width="420" height="315" frameborder="0"></iframe></div>';
	} elseif (empty($slam_featured_video)) {
	    echo the_post_thumbnail('full');
	}

	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
							
		<header class="article-header">
		
			<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			<?php get_template_part( 'partials/content' ); ?>
		</header> <!-- end article header -->
						
		<section class="entry-content clearfix" itemprop="articleBody">
			<?php the_excerpt(); ?>
		</section> <!-- end article section -->
						
	</article> <!-- end article -->
</div>
