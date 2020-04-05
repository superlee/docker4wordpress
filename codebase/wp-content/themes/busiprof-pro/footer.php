<?php $current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() ); ?>
<!-- Footer Section -->
<footer class="footer-sidebar">	
	<!-- Footer Widgets -->	
	<div class="container">		
		<div class="row">		
			<?php if ( is_active_sidebar( 'footer-widget-area' ) )
					{ 
						dynamic_sidebar( 'footer-widget-area' );  
					} 
			?>
		</div>
	</div>
	<!-- /End of Footer Widgets -->	
	
	<!-- Copyrights -->	
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
				<?php 
				if( $current_options['footer_copyright_text'] != '' ) { ?>
				<?php echo $current_options['footer_copyright_text']; ?>
				<?php } ?>
				</div>
				<?php if( $current_options['footer_social_media_enabled'] == 'on' ) { ?>
				<div class="col-md-5">	
					<ul class="social">
					<?php if($current_options['footer_facebook_link']!=''){ ?>
					   <li class="facebook"><a href="<?php echo $current_options['footer_facebook_link']; ?>" data-toggle="tooltip" title="<?php _e('Facebook','busiprof'); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php } 
					if($current_options['footer_twitter_link']!=''){?>
					   <li class="twitter"><a href="<?php echo $current_options['footer_twitter_link']; ?>" data-toggle="tooltip" title="<?php _e('Twitter','busiprof'); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php } if($current_options['footer_linkedin_link']!=''){?>
					   <li class="linkedin"><a href="<?php echo $current_options['footer_linkedin_link']; ?>" data-toggle="tooltip" title="<?php _e('LinkedIn','busiprof'); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php } if($current_options['footer_google_link']!=''){?>
					   <li class="googleplus"><a href="<?php echo $current_options['footer_google_link']; ?>" data-toggle="tooltip" title="<?php _e('GooglePlus','busiprof'); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php } if($current_options['footer_skype_link']!=''){?>
					   <li class="skype"><a href="<?php echo $current_options['footer_skype_link']; ?>" data-toggle="tooltip" title="<?php _e('Skype','busiprof'); ?>"><i class="fa fa-skype"></i></a></li>
					<?php } if($current_options['footer_instagram_link']!=''){?>
					   <li class="instagram"><a href="<?php echo $current_options['footer_instagram_link']; ?>" data-toggle="tooltip" title="<?php _e('Instagram','busiprof'); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- Copyrights -->	
	
</footer>
</div>
<!-- /End of Footer Section -->

<!--Scroll To Top--> 
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/End of Scroll To Top--> 	
<?php wp_footer(); ?>

</body>
</html>