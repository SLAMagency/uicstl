<?php get_header(); ?>
<?php 
	if (have_posts()) : while (have_posts()) : the_post();

		$model = new Model($post);

?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-8 medium-8 columns clearfix" role="main">
					
					  	
					
					    	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					
							    <section class="entry-content clearfix" itemprop="articleBody">

									<?php the_content(); ?>
									
									<?php 

										if ($model->brochure) {

											echo "<a class='button' href='{$model->brochure}'>Download Brochure</a>";

										}
										if ($model->model_floorplan) {

											echo "<a class='button' href='{$model->model_floorplan}'>Download Brochure</a>";

										}
									?>
									

								</section> <!-- end article section -->
													
																
								
																				
							</article> <!-- end article -->


					   
			
					</div> <!-- end #main -->

					<div class="columns medium-4">
						
						<?php 

							echo $model->model_amenities;

						?>

					</div>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

			<div class="slam_section model-gallery">
				<div class="slam_section_content">


					<?php echo do_shortcode($model->gallery); ?>

				</div>
			</div>
	
				<?php echo $model->children(); ?>

			</div>
			<?php echo do_shortcode('[simple-cta contact="Trevor Davis" email="tdavis@uicstl.com" phone="314.477.2799" interest="Architecture &amp; Urbanism"]'); ?>


 <?php endwhile; endif; ?>

<?php //if ( dynamic_sidebar('PostWidget') ) : else : endif; ?>
<?php get_footer(); ?>

