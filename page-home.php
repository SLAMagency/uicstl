<?php
/*
Template Name: Home
*/
?>

<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(''); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons -->
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-57449123-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

	<div class="off-canvas-wrap" data-offcanvas>
		<div class="inner-wrap">
			<div id="container">

				<header class="header" role="banner">
				
					<div id="inner-header">
				
						 <?php get_template_part( 'partials/nav', 'offcanvas' ); ?>
				
						 <?php // get_template_part( 'partials/nav', 'topbar' ); ?>
				
						 <?php // get_template_part( 'partials/nav', 'offcanvas-sidebar' ); ?>
				
						<!-- You only need to use one of the above navigations.
							 Offcanvas-sidebar adds a sidebar to a "right" offcanavas menus. -->
				
					</div> <!-- end #inner-header -->
				
				</header> <!-- end header -->
				
				<div class="row">
				<div class="video-content-2">
					<div class="video-title-2">DEVELOP <span class="text-yellow">DESIGN</span> BUILD</div>
				</div>
				</div>

			<div id="video-container">

				<!-- "Video For Everybody" http://camendesign.com/code/video_for_everybody -->
				<video preload="auto" autoplay="true" loop="loop" muted="muted" volume="0" poster="http://uicstl.com/wp-content/uploads/uic-video-placeholder.png" width="100%" height="100%" id="video-background">
					<source src="http://uicstl.com/wp-content/uploads/uic-home-video-final.mp4" type="video/mp4" />
					<source src="http://uicstl.com/wp-content/uploads/uic-home-video-final.webm" type="video/webm" />
					<source src="http://uicstl.com/wp-content/uploads/uic-home-video-final.ogg" type="video/ogg" />
					<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="100%" height="100%">
						<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
						<param name="allowFullScreen" value="true" />
						<param name="wmode" value="transparent" />
						<param name="flashVars" value="config={'playlist':['http%3A%2F%2Fuicstl.com%2Fwp-content%2Fuploads%2Fuic-video-placeholder.png',{'url':'http%3A%2F%2Fuicstl.com%2Fwp-content%2Fuploads%2Fuic-home-video-final.mp4','autoPlay':false}]}" />
						<img alt="UIC Video Placeholder" src="http://uicstl.com/wp-content/uploads/uic-video-placeholder.png" width="100%" height="100%" />
					</object>
				</video>
			
			</div>
			
			<div id="home-content">
				
			<!-- Insert Icon Squares -->	
			<?php get_template_part( 'partials/squares' ); ?>
				
			<div class="service-dropdown-2">
				<div class="row clearfix">
					<div class="large-5 medium-5 small-12 columns">
						<div class="service-title">BUILD YOUR</div>
					</div>
					<div class="large-7 medium-7 small-12 columns">
						<div id="dd" class="wrapper-dropdown-5" tabindex="1"><span id="typed-cursor" class="blinking">I</span>
						    <ul class="dropdown">
								<li><a href="<?php echo home_url(); ?>/fratello-moore-residence/">HOME</a></li>
						        <li><a href="<?php echo home_url(); ?>/shenandoah-ave-kitchen/">KITCHEN</a></li>
						        <li><a href="<?php echo home_url(); ?>/city-garden-montessori/">SCHOOL</a></li>
						        <li><a href="<?php echo home_url(); ?>/switch-office-renovation/">OFFICE</a></li>
						        <li><a href="<?php echo home_url(); ?>/botanical-heights/">NEIGHBORHOOD</a></li>
						        <li><a href="<?php echo home_url(); ?>/climb-so-ill/">DREAM</a></li>
						    </ul>
						</div>
					</div>
				</div>
			</div>
			
				<div id="inner-content" class="row clearfix">
			
				    <div id="main" class="large-12 medium-12 columns" role="main">
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'page' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>

    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
				
				<div class="blog-carousel clearfix">
					<div class="row">
						<div class="large-12 columns blog-post">
						  <?php $the_query = new WP_Query( 'cat=11', 'showposts=10' ); ?>
						  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						  <div class="large-4 medium-4 small-12 columns">
						  <div class="blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
						  <hr>
						  <?php the_excerpt() ?>
						  </div>
						  <?php endwhile;?>
							<?php
							// Get the ID of a given category
							$category_id = get_cat_ID( 'press' );
							
							// Get the URL of this category
							$category_link = get_category_link( $category_id );
							?>
						</div>
						<div class="right">
							<p><a href="<?php echo esc_url( $category_link ); ?>">view all &raquo</a></p>
						</div>
					</div>
				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
