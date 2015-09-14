<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-12 medium-12 columns first clearfix" role="main">
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'single' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>
			
					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php if ( dynamic_sidebar('PostWidget') ) : else : endif; ?>
<?php get_footer(); ?>