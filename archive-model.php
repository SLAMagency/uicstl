<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row fullwidth clearfix">
				
					<?php if (have_posts()) :  ?>

					   <div id="main" class="clearfix" role="main">


					    	<ul class="large-block-grid-4">

					    	<?php while (have_posts()) : the_post(); ?>
					
					    	
						    	<?php 

						    		$model = new Model($post);

						    		echo $model->block();

						    	?>

						
						    <?php endwhile; ?>		

						    </ul>
					    
					</div> <!-- end #main -->
					<div class="thin-padding">
					
					        <?php if (function_exists('slam_page_navi')) { ?>
						        <?php slam_page_navi(); ?>
					        <?php } else { ?>
						        <nav class="wp-prev-next columns large-6 small-centered text-center">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "slamtheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "slamtheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
					</div>
					
					    <?php else : ?>
					
    						<?php get_template_part( 'partials/content', 'missing' ); ?>
					
					    <?php endif; ?>
			
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>