<?php
$default_content = false;
$current_options = get_option('busiprof_pro_theme_options');
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
						'choice'    => 'customizer_repeater_icon',
						'image_url' => get_the_post_thumbnail_url(),
						'title'      => get_the_title(),
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
						'choice'    => 'customizer_repeater_icon',
						'title'      => isset($service['service_title_one'])? $service['service_title_one']:'',
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
						'choice'    => 'customizer_repeater_icon',
						'title'      => isset($service['service_title_four'])? $service['service_title_four']:'',
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
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
if( $current_options['home_service_section_enabled']=='on' ) { ?>
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
		
			 <?php busiprof_service_content( $busiprof_service_content ); ?>
	
			<div class="clearfix"></div>
			
			
			<div class="col-md-12 col-xs-12">
				<?php if( $current_options['service_readmore_button'] != '' ) { ?>
				<div class="btn-wrap">
					<?php 
					if( $current_options['service_readmore_link'] != '' ) 
					{ 
						$link = $current_options['service_readmore_link'];
					}
					?>
					<a href="<?php echo $link; ?>" <?php if( $current_options['service_readmore_link_target'] == true ) { echo "target='_blank'"; } ?> ><?php echo $current_options['service_readmore_button'];
					?>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
</section>
<!-- End of Service Section -->

<div class="clearfix"></div>
<?php } 
function busiprof_service_content( $busiprof_service_content, $is_callback = false ) {
	$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
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
			$image = ! empty( $features_item->image_url ) ? apply_filters( 'busiprof_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			$color = '';
			$color = $features_item->color;
			
			?>
			<div class="col-md-<?php echo $current_options['service_layout'] ?> col-sm-6 col-xs-12 service-box">
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
			<?php endif; }?>
			
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
			$colors = array('#00bcd4','#e91e63','#4caf50', '#5ca2df');
			$title = array (__('Web Design','busiprof'), __('Unique Elements','busiprof'), __('User Friendly','busiprof'), __('24/7 Support','busiprof'));
			$icon = array('fa fa-laptop','fa fa-tasks','fa fa-thumbs-o-up','fa fa-life-ring');
			for($i=0; $i<=3; $i++) { ?>
			<div class="col-md-<?php echo $current_options['service_layout'] ?> col-sm-6 col-xs-12 service-box" title="Shift-click to edit this widget.">
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