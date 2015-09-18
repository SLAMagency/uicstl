
					<a href="#" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i></a>
					
					<footer class="footer" role="contentinfo">
					
						<div class="secondary-footer clearfix">
							<div class="row">
							<?php if ( dynamic_sidebar('footer-left') ) : else : endif; ?>
							<?php if ( dynamic_sidebar('footer-right') ) : else : endif; ?>
							</div>
						</div>
					
						<div id="inner-footer" class="row clearfix">
						
							<div class="large-6 medium-6 columns">
								<nav role="navigation">
		    						<?php slam_footer_links(); ?>
		    					</nav>
		    				</div>
			               
			                <div class="large-6 medium-6 columns">		
								<p class="source-org copyright right">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
							</div>		
						</div> <!-- end #inner-footer -->			
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<div id="inquiry_modal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
		  <?php echo do_shortcode('[gravityform id=5 title=false description=false ajax=true]'); ?>
		  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
						
				<!-- all js scripts are loaded in library/slam.php -->
				<?php wp_footer(); ?>
				<!-- Please call pinit.js only once per page -->
				<script type="text/javascript" async defer  data-pin-shape="round" data-pin-hover="true" data-pin-build="parsePinBtns" src="//assets.pinterest.com/js/pinit.js"></script>
				<script type="text/javascript">

					$(window).bind("load", function() {
					   window.parsePinBtns();
					});

				</script>
	</body>
	

</html> <!-- end page -->