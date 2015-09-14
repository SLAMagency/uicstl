<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-8 medium-8 columns first clearfix" role="main">
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'single' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>
			
					</div> <!-- end #main -->
    
					<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php if ( dynamic_sidebar('PostWidget') ) : else : endif; ?>
<?php get_footer(); ?>

<!-- Fix Sidebars for Neighborhood Posts -->
<?php 
	if (in_category( 26 )) {
	echo "<style>#text-5, #text-8 {display:none;}</style>";
}
?>

<!--
<?php 
	if (in_category( 20 ) && !in_category( 26 ) ) {
	echo "<style>#text-18, #text-28 {display:none;}</style>";
}
?>
-->