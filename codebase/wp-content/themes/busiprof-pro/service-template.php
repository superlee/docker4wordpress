<?php
//Template Name: Service
get_header (); 
get_template_part('index', 'bannerstrip');

//$default_content = false;
//$busiprof_features_content  = get_theme_mod( 'busiprof_pro_theme_options', $default_content );
$testimonial_options = get_theme_mod('busiprof_testimonial_content');
if(empty($testimonial_options))
{
	$pro_testimonial_data = get_option('busiprof_pro_theme_options');
	$lite_testimonial_data = get_option('busiprof_theme_options');
		if(!empty($pro_testimonial_data))
				{
						$args = array( 'post_type' => 'busiprof_testimonial') ; 	
						$testimonial = new WP_Query( $args ); 
						if( $testimonial->have_posts() )
							{
								
								while ( $testimonial->have_posts() ) : $testimonial->the_post();
									$pro_tesitimonial_data_old[] = array(
									'title'      => get_the_title(),
									'text'       => get_post_meta( get_the_ID(), 'testimonial_desc', true ),
									'designation' => get_post_meta( get_the_ID(), 'author_designation', true ),
									'link'       => get_post_meta( get_the_ID(), 'author_link', true ),
									'image_url'  => get_the_post_thumbnail_url(),
									'open_new_tab' => get_post_meta( get_the_ID(),'author_link_target', true ),
									'id'    => 'customizer_repeater_56d7ea7f40b96',
								);
								endwhile; 
								$testimonial_options = json_encode($pro_tesitimonial_data_old);
							}
				}elseif(!empty($lite_testimonial_data)){
					$page = get_option( 'theme_mods_busiprof','');
					if($page!=''){
					foreach($page as $key => $value) {
					  if($key == 'busiprof_testimonial_content'){
						  $testimonial_options = $value;
					  }
					}
					}else {
					$old_testimonial_data = get_option( 'busiprof_theme_options');
	
				$testimonial_options = json_encode( array(
				array(
				'title'      => isset($old_testimonial_data['testimonials_name_one'])? $old_testimonial_data['testimonials_name_one']:'Robert Johnson',
				'text'       => isset($old_testimonial_data['testimonials_text_one'])? $old_testimonial_data['testimonials_text_one']:'We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...',
				'designation' => isset($old_testimonial_data['testimonials_designation_one'])? $old_testimonial_data['testimonials_designation_one']:'(CEO & Founder)',
				'link'       => '#',
				'image_url'  => isset($old_testimonial_data['testimonials_image_one'])? $old_testimonial_data['testimonials_image_one']:get_template_directory_uri()."/images/item12.jpg",
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				'open_new_tab' => 'no',
				
				),
				array(
				'title'      => isset($old_testimonial_data['testimonials_name_two'])? $old_testimonial_data['testimonials_name_two']:'Annah Doe',
				'text'       => isset($old_testimonial_data['testimonials_text_two'])? $old_testimonial_data['testimonials_text_two']:'We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...',
				'designation' => isset($old_testimonial_data['testimonials_designation_two'])? $old_testimonial_data['testimonials_designation_two']:'(Team Leader)',
				'link'       => '#',
				'image_url'  => isset($old_testimonial_data['testimonials_image_two'])? $old_testimonial_data['testimonials_image_two']:get_template_directory_uri()."/images/item12.jpg",
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				'open_new_tab' => 'no',
				
				),
			) );
				}
				}
	
}

$busiprof_service_content  = get_theme_mod( 'busiprof_service_content');
if(empty($busiprof_service_content))
{
	$pro_service_data = get_option('busiprof_pro_theme_options');
	$lite_service_data = get_option('busiprof_theme_options');
	if(!empty($pro_service_data))
		{
			$args = array( 'post_type' => 'busiprof_service') ; 	
			$service = new WP_Query( $args ); 
			if( $service->have_posts() )
				{
					while ( $service->have_posts() ) : $service->the_post();
						$pro_service_data_old[] = array(
						'icon_value' => get_post_meta( get_the_ID(),'service_icon_icons', true ),
						'image_url' => get_the_post_thumbnail_url(),
						'title'      => get_the_title(),
						'choice'    => 'customizer_repeater_icon',
						'text'       => get_post_meta( get_the_ID(),'meta_service_description', true ),
						'open_new_tab' => get_post_meta( get_the_ID(),'service_icon_target', true ),
						'link'       => get_post_meta( get_the_ID(),'service_icon_link', true ),
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						'color'      => '#2A7BC1',
					);
					endwhile; 
					$busiprof_service_content = json_encode($pro_service_data_old);
				}
		}elseif(!empty($lite_service_data)){
			
			
			$page = get_option( 'theme_mods_busiprof','');
			if($page!=''){
			foreach($page as $key => $value) {
			  if($key == 'busiprof_service_content'){
				  $busiprof_service_content = $value;
			  }
			}
			}else{
				$service = get_option('busiprof_theme_options');
				
				//$busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
				//if ( ! empty( $busiprof_service_content_control ) ) {
					$busiprof_service_content = json_encode( array(
						array(
						'icon_value' => isset($service['service_icon_one'])? $service['service_icon_one']:'',
						'image_url'	 => isset($service['service_image_one'])? $service['service_image_one']:'',
						'title'      => isset($service['service_title_one'])? $service['service_title_one']:'',
						'choice'    => 'customizer_repeater_icon',
						'text'       => isset($service['service_text_one'])? $service['service_text_one']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						'color'      => '#e91e63',
						),
						array(
						'icon_value' => isset($service['service_icon_two'])? $service['service_icon_two']:'',
						'image_url'	 => isset($service['service_image_two'])? $service['service_image_two']:'',
						'choice'    => 'customizer_repeater_icon',
						'title'      => isset($service['service_title_two'])? $service['service_title_two']:'',
						'text'       => isset($service['service_text_two'])? $service['service_text_two']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						'color'      => '#00bcd4',
						),
						array(
						'icon_value' => isset($service['service_icon_three'])? $service['service_icon_three']:'',
						'image_url'	 => isset($service['service_image_three'])? $service['service_image_three']:'',
						'choice'    => 'customizer_repeater_icon',
						'title'      => isset($service['service_title_three'])? $service['service_title_three']:'',
						'text'       => isset($service['service_text_three'])? $service['service_text_three']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						'color'      => '#4caf50',
						),
						
						array(
						'icon_value' => isset($service['service_icon_four'])? $service['service_icon_four']:'',
						'image_url'	 => isset($service['service_image_four'])? $service['service_image_four']:'',
						'title'      => isset($service['service_title_four'])? $service['service_title_four']:'',
						'choice'    => 'customizer_repeater_icon',
						'text'       => isset($service['service_text_four'])? $service['service_text_four']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						'color'      => '#4caf50',
						),
					
					
						) );
				//}
			}
		}
}
?>

<!-- Service Section -->
<section id="section" class="service">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php if( $current_options['service_tag_line'] != '' ) { ?>
					<h1 class="section-heading"><?php echo $current_options['service_tag_line']; ?></h1>
					<?php } if( $current_options['service_tag_desciption'] != '' ) { ?>
					<p><?php echo $current_options['service_tag_desciption']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
			<?php busiprof_service_content( $busiprof_service_content );?>	
</section>
<!-- End of Service Section -->				
<?php 

function busiprof_service_content( $busiprof_service_content, $is_callback = false ) {
	if ( ! $is_callback ) { ?>
		<div class="row busiprof-features-content">
	    <?php
	}
	if ( ! empty( $busiprof_service_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$busiprof_service_content = json_decode( $busiprof_service_content );
		foreach ( $busiprof_service_content as $features_item ) :
			$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'busiprof_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
			$title = ! empty( $features_item->title ) ? apply_filters( 'busiprof_translate_single_string', $features_item->title, 'Features section' ) : '';
			$text = ! empty( $features_item->text ) ? apply_filters( 'busiprof_translate_single_string', $features_item->text, 'Features section' ) : '';
			$link = ! empty( $features_item->link ) ? apply_filters( 'busiprof_translate_single_string', $features_item->link, 'Features section' ) : '';
			$image = ! empty( $features_item->image_url ) ? apply_filters( 'hestia_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			$color = '';
			$color = $features_item->color;
			?>
			<div class="col-md-3 col-sm-6 col-xs-12 service-box">
			<div class="post">
			<?php if($features_item->choice == 'customizer_repeater_image'){ ?>
								<?php if ( ! empty( $image ) ) : ?>
									<?php if ( ! empty( $link ) ) : ?>
										<a href="<?php echo esc_url( $link ); ?>">
									<?php endif; ?>
									<img class="services_cols_mn_icon"
										 src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
									<?php if ( ! empty( $link ) ) : ?>
										</a>
									<?php endif; ?>
			<?php endif; } ?>
			
			<?php if ( ! empty( $link ) ) : ?>
						<a href="<?php echo esc_url( $link ); ?>">
							<?php endif; ?>
			<?php if($features_item->choice == 'customizer_repeater_icon'){ ?>
				<?php if ( ! empty( $icon ) ) :?>
							<div class="service-icon" <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . '"'; } ?>>
									<i class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div>
							<?php endif; ?>
			<?php } ?>
				<?php if ( ! empty( $title ) ) : ?>
				
								<div class="entry-header">
								<h4 class="entry-title"><?php echo esc_html( $title ); ?></h4>
								</div>
							<?php endif; ?>
				<?php if ( ! empty( $link ) ) : ?>
						</a>
					<?php endif; ?>
			<?php if ( ! empty( $text ) ) : ?>
			
							<div class="entry-content">
							<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
							</div>
			
							
						<?php endif; ?>
			</div>
			</div>
			<?php
			endforeach;
			}
			else
			{
			$colors = array('#00bcd4','#e91e63','#4caf50', '#4caf50');
			$title = array (__('Web Design','busiprof'), __('Unique Elements','busiprof'), __('User Friendly','busiprof'), __('24/7 Support','busiprof'));
			$icon = array('fa fa-laptop','fa fa-tasks','fa fa-thumbs-o-up','fa fa-life-ring');
			for($i=0; $i<=3; $i++) { ?>
			<div class="col-md-3 col-sm-6 col-xs-12 service-box" title="Shift-click to edit this widget.">
				<div class="post">
				<a href="#">
					<div class="service-icon" style="color:<?php echo $colors[$i]; ?>">
						<i class="<?php echo $icon[$i]; ?>"></i>
					</div>
					<div class="entry-header">
						<h4 class="entry-title"><?php echo $title[$i]; ?></h4>
					</div>
				</a>
				<div class="entry-content">
					<p><?php echo _e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','busiprof'); ?></p>
				</div>		
				</div>
			</div>
			<?php } 
	}
	if ( ! $is_callback ) { ?>
		</div>
		<?php
	}
}
/*
if ( function_exists( 'busiprof_features' ) ) {
	$section_priority = apply_filters( 'busiprof_section_priority', 10, 'busiprof_features' );
	add_action( 'busiprof_sections', 'busiprof_features', absint( $section_priority ) );
	add_action( 'after_setup_theme', 'busiprof_features_register_strings', 11 );
}*/
?>

<div class="clearfix"></div>
<?php if($current_options['enable_testimonial_section_portfolio'] == 'on') {?>
<!-- Testimonial Scroll Section -->
<section class="testimonial-scroll">
	<div class="container">
		<div class="row">
		
			<!-- Section Title -->
			<div class="col-md-12">
				<div class="section-title-mini border">
					<?php if( $current_options['testimonial_head'] != '' ) { ?>
					<h4 class="section-heading txt-color"><?php echo $current_options['testimonial_head'];?>
					<?php } if( $current_options['testimonial_tagline'] !='') { ?>
					<span><?php echo $current_options['testimonial_tagline'];?></span></h4>
					<?php } ?>
					<?php 
					$testimonial_options = json_decode($testimonial_options);
					if(count ($testimonial_options)>1){
					?>
					<!-- Pagination --> 
					<ul class="testi-nav">
						<li><a class="testi-prev" href="#myTestimonial" data-slide="prev"></a></li>
						<li><a class="testi-next" href="#myTestimonial" data-slide="next"></a></li>
					</ul> 
					<!-- /Pagination -->
					<?php
					}?>
				</div>
			</div>
			<!-- /Section Title -->	
			
			<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myTestimonial">
				<div class="carousel-inner">
					<?php
					$t=true;
					
					if( $testimonial_options!='' )
						{
					foreach($testimonial_options as $testimonial_iteam){  
					
							$title = ! empty( $testimonial_iteam->title ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->title, 'Testimonial section' ) : '';
							$test_desc = ! empty( $testimonial_iteam->text ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->text, 'Testimonial section' ) : '';
							$test_link = ! empty( $testimonial_iteam->link ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->link, 'Testimonial section' ) : '';
							$open_new_tab = $testimonial_iteam->open_new_tab;
							
							$designation = ! empty( $testimonial_iteam->designation ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->designation, 'Testimonial section' ) : '';
						
				
					?>
					<div class="col-md-12 pull-left item <?php if( $t == true ){ echo 'active'; } $t = false; ?>">
						<div class="post"> 
							<?php $default_arg =array('class' => "img-circle"); ?>
							<figure class="post-thumbnail">
							<a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
							<img alt="img" class="img-responsive" src="<?php echo $testimonial_iteam->image_url; ?>" draggable="false">
							</a>
							</figure>
							
							<div class="entry-content">
								<p><?php echo $test_desc; ?></p>
							</div>
							<div class="media"> 
								<div class="media-body">
									<span class="author-name"> <a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>> <?php echo $title; ?> </a> <small class="designation"><?php echo $designation; ?></small></span>
								</div>								
							</div>
						</div>
					</div>
					<?php } } else {
					$i=1;
					$args = array( 'post_type' => 'busiprof_testimonial') ; 	
					$tesimonials = new WP_Query( $args ); 
					if( $tesimonials->have_posts() )
					{
					while ( $tesimonials->have_posts() ) : $tesimonials->the_post();
					
					?>
					<div class="col-md-12 pull-left item <?php if($i == 1) echo "in active" ; ?>">
						<div class="post"> 
							<div class="entry-content">
								<p><?php echo get_post_meta( get_the_ID(), 'testimonial_desc', true ); ?></p>
							</div>
							<div class="media"> 
								<figure class="post-thumbnail width-sm">
								<?php if(has_post_thumbnail()){ 
								the_post_thumbnail( ); 
								} ?>
								</figure> 
								<div class="media-body">
									<span class="author-name"><?php echo the_title() ;?> <small class="designation"><?php echo get_post_meta( get_the_ID(), 'author_designation', true ); ?></small></span>
								</div> 
							</div>
						</div>
					</div>
					<?php if($i%4==0){	echo "<div class='clearfix'></div>";} $i++; endwhile;  } } ?>
				</div>
			</div>
		</div>
	</div>		
</section>
<!-- End of Testimonial Section -->
<?php } if( $post->post_content != "" ) { ?>
<!-- Other Service Section -->
<section class="other-service">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="post">
					<div class="entry-content">
						<?php  the_post(); the_content(); ?>
					</div>	
				</div>
			</div>			
		</div>
	</div>	
</section>
<!-- End of Other Service Section -->
<?php } ?>

<div class="clearfix"></div>

<!-- Clients Section -->
<?php if(($current_options['enable_client_section_portfolio'])=='on') { get_template_part('index','clientstrip'); }?>
<!-- End of Clients Section -->
<?php get_footer(); ?>