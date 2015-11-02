<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
				
				    <div id="main" class="large-10 medium-10 large-centered columns first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	
					    	<?php 

					    		$model = new Model($post);

					    		$model->block();

					    	?>

					
					    <?php endwhile; ?>		
					    
					</div> <!-- end #main -->
					
					        <?php if (function_exists('slam_page_navi')) { ?>
						        <?php slam_page_navi(); ?>
					        <?php } else { ?>
						        <nav class="wp-prev-next">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "slamtheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "slamtheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
					
					    <?php else : ?>
					
    						<?php get_template_part( 'partials/content', 'missing' ); ?>
					
					    <?php endif; ?>
			
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>