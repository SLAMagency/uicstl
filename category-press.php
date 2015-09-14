<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
				
				    <div id="main" class="large-12 large-uncentered medium-10 medium-centered columns first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<div class="row">
								<div class="large-2 medium-2 columns">
									<!-- <?php the_post_thumbnail('thumbnail'); ?> -->
									<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('thumbnail');
									} else { ?>
									<img src="http://uic.slamagency.com/wp-content/uploads/uic-default-thumb.jpg" />
									<?php } ?>
								</div>
								<div class="large-10 medium-10 columns">
						    		<?php get_template_part( 'partials/loop', 'archive' ); ?>
								</div>
							</div>
					
					    <?php endwhile; ?>		
					    
					</div> <!-- end #main -->
					
					<div class="row clearfix">
					<div class="pagination-centered clearfix">
					
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
					    
					</div>
					</div>
			
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>