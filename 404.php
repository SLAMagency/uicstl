<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-8 medium-8 columns first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">
						
							<header class="article-header">
								<h1><?php _e("404 - Not Found", "slamtheme"); ?></h1>
							</header> <!-- end article header -->
					
							<section class="entry-content">
								<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "slamtheme"); ?></p>
							</section> <!-- end article section -->

							<section class="search">
							    <p><?php get_search_form(); ?></p>
							</section> <!-- end search section -->
						
							<footer class="article-footer">
							    <p><?php _e("", "slamtheme"); ?></p>
							</footer> <!-- end article footer -->
					
						</article> <!-- end article -->
			
					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>