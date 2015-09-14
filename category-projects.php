<?php get_header(); ?>

				<div class="clearfix">
					
					<div id="filters" class="services-nav button-group">
					  <button class="button is-checked" data-filter="*">All</button>
					  <?php
						$args = array(
						  'orderby' => 'id',
						  'order' => 'ASC',
						  'child_of' => 4,
						  'exclude' => '24,25',
						  );
						$categories = get_categories($args);
						  foreach($categories as $category) { 
						    echo '<button class="button" data-filter="' . sprintf( __( ".category-%s" ), $category->slug ) . '" ' . '>' . $category->name.'</button> ';  } 
					   ?>
					   <button class="button right" data-filter=".category-for-sale">For Sale</button>
					   <button class="button right" data-filter=".category-for-rent" style="margin-right: 3px;">For Rent</button>
					</div>
			
				    <div id="main" class="clearfix isotope-container" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop-masonry', 'archive' ); ?>
					
					    <?php endwhile; ?>		
					
					    <?php else : ?>
					    
    						<?php get_template_part( 'partials/content', 'missing' ); ?>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
				
				<div class="row">
				<div class="page-navigation-div large-3 columns large-centered">
		        <?php if (function_exists('slam_page_navi')) { ?>
		            <?php slam_page_navi(); ?>
		        <?php } else { ?>
		        
					<nav class="wp-prev-next">
					    <ul class="clearfix inline no-bullet">
					        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "slamtheme")) ?></li>
					        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "slamtheme")) ?></li>
					    </ul>
					</nav>

		        <?php } ?>
				</div>
				</div>	
				    
				</div> <!-- end .clearfix -->

<?php get_footer(); ?>