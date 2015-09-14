<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-8 medium-8 columns first clearfix" role="main">
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					
							    <section class="entry-content clearfix" itemprop="articleBody">

									<?php the_content(); ?>
									

									<?php 

										$info['amenities'] 	= get_post_meta($post->ID, 'ak_unit_amenities', true);
										$info['price'] 		= get_post_meta($post->ID, 'ak_unit_price', true);
										$info['Floorplan'] 	= get_post_meta($post->ID, 'ak_unit_floorplan', true);

										if ($info['Floorplan']) {
											$info['Floorplan'] = wp_get_attachment_image( $info['Floorplan'] );
										}

										foreach($info as $key => $value) {
											if($value != '') {
												echo "<dt style='text-transform: uppercase;'>{$key}</dt><dd>{$value}</dd>";
											}
										}


									?>

								</section> <!-- end article section -->
													
								<footer class="article-footer">
									<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'slamtheme') . '</span> ', ', ', ''); ?></p>	</footer> <!-- end article footer -->
																
								<?php comments_template(); ?>	
																				
							</article> <!-- end article -->
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>
			
					</div> <!-- end #main -->
    
					<?php //get_sidebar(); ?>
						<div id="sidebar1" class="sidebar large-4 medium-4 columns" role="complementary">
							<div id="text-8" class="widget widget_text"><h4 class="widgettitle">Residential Leasing</h4>			<div class="textwidget"><p>Contact: <br>
								Karen Ditz<br>
								Email: <a href="mailto:leasing@uicstl.com">leasing@uicstl.com</a><br>
								Office: <a href="tel:3147717300.">314.771.7300</a></p>
								<p><a href="http://uicstl.com/tower-grove-mews/">Tower Grove Mews</a></p>
								<p><a href="http://uicstl.com/mcree-apartments-coming-soon/">McRee Garden Apartments</a></p></div>
							</div>
						</div>


				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php //if ( dynamic_sidebar('PostWidget') ) : else : endif; ?>
<?php get_footer(); ?>

