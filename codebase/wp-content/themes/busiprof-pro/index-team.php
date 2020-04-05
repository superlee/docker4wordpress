<?php $current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

if( $current_options['home_team_section_enabled'] == 'on' ) { ?>
<!-- Additional Section One - Team -->
<?php if( $current_options['home_team_back_image_enabled'] == 'on' ) { ?>
<section id="section" class="team-section" style="background:rgba(0, 0, 0, 0) url('<?php echo $current_options['team_background_image']; ?>') repeat <?php echo $current_options['team_image_attachment']; ?> 0 0;">
<div class="overlay" style="background: none repeat scroll 0 0 <?php echo ($current_options['team_image_overlay']!=true?'transparent':'rgba(0, 0, 0, 0.7)'); ?>;">
<?php }
else { ?>
<section id="section" class="bg-color team-bg">
<?php } ?>


	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php if( $current_options['team_head'] != '' ) {?>
					<h1 class="section-heading"><?php echo $current_options['team_head'];?></h1>
					<?php } if( $current_options['team_tagline'] != '' ) {?>
					<p><?php echo $current_options['team_tagline']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<!-- Team -->
		<div class="row">
			<?php $arg = array( 'post_type' => 'busiprof_team', 'posts_per_page'=> $current_options['team_list']);
			$team = new WP_Query( $arg ); 				
			if( $team->have_posts() )
			{
			$i=1;
			while ( $team->have_posts() ) : $team->the_post(); ?>	
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
					    
					<?php 
					$team_member_link = sanitize_text_field( get_post_meta( get_the_ID(),'team_member_link', true ));

                    $team_target = sanitize_text_field( get_post_meta( get_the_ID(),'team_target', true ));
					
				    ?>
						<?php $twitter_url = sanitize_text_field( get_post_meta( get_the_ID(),'twitter_url', true ));  ?>
						<?php if ($twitter_url !='') { ?>
						<div class="twitter-social"><a href="<?php echo $twitter_url ?>" <?php if(!empty($team_target)){ echo 'target="_blank"'; } ?>>&nbsp;</a></div>
						<?php } ?>
						
						<?php $defalt_arg =array('class' => "img-responsive" )?>
						<?php if(has_post_thumbnail()):?>
						<div class="team-gravatar">
						<?php if($team_member_link !=''){  ?>
						<a href="<?php echo $team_member_link ?>" <?php if(!empty($team_target)){ echo 'target="_blank"'; } ?>>
						<?php } ?>
						<?php the_post_thumbnail('', $defalt_arg); ?>
						<?php if($team_member_link !=''){  ?>
						</a>
						<?php } ?>
						</div>
						<?php endif ;?>
						
						<?php $team_fb_url = sanitize_text_field(get_post_meta(get_the_ID(),'fb_url',true)); ?>
						<?php if ($team_fb_url!='') {?>
						<div class="facebook-social"><a href="<?php echo $team_fb_url ?>" <?php if(!empty($team_target)){ echo 'target="_blank"'; } ?>>&nbsp;</a></div>
						<?php } ?>
						<?php $team_linked_url = sanitize_text_field (get_post_meta(get_the_ID(),'linked_url',true)); ?>
						<?php if($team_linked_url!='') {?>
						<div class="linkedin-social"><a href="<?php echo $team_linked_url ;?>" <?php if(!empty($team_target)){ echo 'target="_blank"'; } ?>>&nbsp;</a></div>
						<?php } ?>
					</div>
					<div class="media-body">
						<?php $team_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_designation', true )); ?>
						<h4 class="team-name">
						<?php if($team_member_link !=''){  ?>
						<a href="<?php echo $team_member_link ?>" <?php if(!empty($team_target)){ echo 'target="_blank"'; } ?>>
						<?php } ?>
						<?php the_title() ;?>
						<?php if($team_member_link !=''){  ?>
						</a>
						<?php } ?>
						
						<?php if($team_designation !=''): ?>
						<span class="team-designation"><?php echo "(".$team_designation.")" ;?></span>
						<?php endif; ?>
						
						</h4>
						<?php $team_description = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_desc', true )); ?>
						<?php if($team_description !=''): ?>
						   <p><?php echo $team_description ;?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php $i++; endwhile; }  else { 
			$team_title = array('Robert Johnson','Natelie Portman','Annah Doe','Charlie Sun');
			$team_image= array('item9','item10','item11','item12');
			$team_designation = array('(CEO & Founder)', '(Developer)', '(Sales Executive)','(Team Leader)');
			for($i=0;$i<4;$i++)
			{ ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
						<div class="twitter-social"><a href="#">&nbsp;</a></div>
						<div class="team-gravatar"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $team_image[$i]; ?>.jpg"></div>
						
						<div class="facebook-social"><a href="#">&nbsp;</a></div>
						<div class="linkedin-social"><a href="#">&nbsp;</a></div>
					</div>
					<div class="media-body">
						<h4 class="team-name"><?php echo $team_title[$i]; ?> <span class="team-designation"><?php echo $team_designation[$i]; ?></span></h4>
						<p><?php echo _e('Here you can add a short bio about the owner, or the staff, of your establishment. Here you can add a short bio about the owner, or the staff, of your establishment. Neque porro quisquam est, qui dolorem ipsum am quaerat voluptatem.','busiprof'); ?> </p>
					</div>
				</div>
			</div>	
				
			<?php  } ?>
			<div class="clearfix"></div>
			<?php } ?>
		</div>
		<!-- End of Team -->
	</div>	
	
</section>	
<!-- End of Additional Section One - Team -->
<div class="clearfix"></div>
<?php } ?>