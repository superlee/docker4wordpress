<?php
// busiprof default service content data
if ( ! function_exists( 'busiprof_slider_default_customize_register' ) ) :
add_action( 'customize_register', 'busiprof_slider_default_customize_register' );
	function busiprof_slider_default_customize_register( $wp_customize ){
		// Set Busiprof lite old slider data in repeater control.
		 if(get_option('busiprof_theme_options')!='')
		 {
			$data = get_option('busiprof_theme_options');
			$busiprof_slider_content_control = $wp_customize->get_setting( 'busiprof_slider_content' );
			if ( ! empty( $busiprof_slider_content_control ) ) {
				$busiprof_slider_content_control->default = json_encode( array(
					array(
					'title'      => isset($data['caption_head'])? $data['caption_head']:'Responsive WP theme',
					'text'       => isset($data['caption_text'])? $data['caption_text'] :'We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations.',
					'button_text'      => isset($data['readmore_text'])? $data['readmore_text'] : 'Read more',
					'link'       => isset($data['readmore_text_link'])? $data['readmore_text_link'] : '#',
					'image_url'  => isset($data['slider_image'])? $data['slider_image'] :  get_template_directory_uri().'/images/slide1.jpg',
					'open_new_tab' => isset($data['readmore_target'])? $data['readmore_target'] : false,
					'id'         => 'customizer_repeater_56d7ea7f40b50',
					),
				) );
			}
		 } elseif(get_option('busiprof_pro_theme_options')!=''){
			// Set Busiprof lite old slider data in repeater control.
			$busiprof_slider_content_control = $wp_customize->get_setting( 'busiprof_slider_content' );
			if ( ! empty( $busiprof_slider_content_control ) ) {
				$args = array( 'post_type' => 'busiprof_slider') ; 	
				$slider = new WP_Query( $args ); 
				if( $slider->have_posts() ){
					$busiprof_slider_content_control->default = json_encode( array() );
					while ( $slider->have_posts() ) : $slider->the_post();
						$pro_slider_data[] = array(
						'title'      => get_the_title(),
						'text'       => sanitize_text_field( get_post_meta( get_the_ID(),'image_description', true )),
						'button_text'      => sanitize_text_field( get_post_meta( get_the_ID(),'readmore_button', true )),
						'link'       => sanitize_text_field( get_post_meta( get_the_ID(),'readmore_link', true )),
						'image_url'  => get_the_post_thumbnail_url(),
						'open_new_tab' => isset($data['readmore_target'])? $data['readmore_target'] : false,
						'id'         => 'customizer_repeater_56d7ea7f40b50',
					);
					endwhile; 
					$busiprof_slider_content_control->default = json_encode($pro_slider_data);
				}
			} 
		 } else{
				$busiprof_slider_content_control = $wp_customize->get_setting( 'busiprof_slider_content' );
				if ( ! empty( $busiprof_slider_content_control ) ) {
				$busiprof_slider_content_control->default = json_encode( array(
				array(
				'title'      => esc_html__( 'Responsive WP theme', 'busiprof' ),
				'text'       => esc_html__( 'We are a group of passionate designers and developers who love to create awesome WordPress themes with an amazing support and the coolest video documentation.', 'busiprof' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  => get_template_directory_uri().'/images/slide1.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				),
				array(
				'title'      => esc_html__( 'Graphic design', 'busiprof' ),
				'text'       => esc_html__( 'We are a group of passionate designers and developers who love to create awesome WordPress themes with an amazing support and the coolest video documentation.', 'busiprof' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  => get_template_directory_uri().'/images/slide2.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				),
				array(
				'title'      => esc_html__( 'User friendly', 'busiprof' ),
				'text'       => esc_html__( 'We are a group of passionate designers and developers who love to create awesome WordPress themes with an amazing support and the coolest video documentation.', 'busiprof' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  =>  get_template_directory_uri().'/images/slide3.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b98',
				),
			) );
		} 
		 }
}
endif;

// busiprof default service content data
if ( ! function_exists( 'busiprof_service_default_customize_register' ) ) :
	function busiprof_service_default_customize_register( $wp_customize ){
		if(get_option('busiprof_theme_options')==''){
			if(get_option('busiprof_pro_theme_options')!=''){
				//Run this code section if user comes from pro old to pro new 
				$busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
				if ( ! empty( $busiprof_service_content_control ) ){
					$args = array( 'post_type' => 'busiprof_service') ; 	
					$service = new WP_Query( $args ); 
					if( $service->have_posts() ){
						$busiprof_service_content_control->default = json_encode( array() );
						while ( $service->have_posts() ) : $service->the_post();
							$pro_service_data[] = array(
							'icon_value' => get_post_meta( get_the_ID(),'service_icon_icons', true ),
							'image_url' => get_the_post_thumbnail_url(),
							'choice'    => 'customizer_repeater_icon',
							'title'      => get_the_title(),
							'text'       => get_post_meta( get_the_ID(),'meta_service_description', true ),
							'open_new_tab' => get_post_meta( get_the_ID(),'service_icon_target', true ),
							'link'       => get_post_meta( get_the_ID(),'service_icon_link', true ),
							'id'         => 'customizer_repeater_56d7ea7f40b96',
							'color'      => '#2A7BC1',
						);
						endwhile; 
						$busiprof_service_content_control->default = json_encode($pro_service_data);
					}
				}
			} else {
				//Run this code section if user Install direct pro new theme (This is the default service data)
				$busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
				if ( ! empty( $busiprof_service_content_control ) ) {
					$busiprof_service_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa-laptop',
						'title'      => esc_html__( 'Web Design', 'busiprof' ),
						'text'       => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'busiprof' ),
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						'color'      => '#e91e63',
						),
						array(
						'icon_value' => 'fa-tasks',
						'title'      => esc_html__( 'Unique Elements', 'busiprof' ),
						'text'       => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'busiprof' ),
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						'color'      => '#00bcd4',
						),
						array(
						'icon_value' => 'fa-thumbs-o-up',
						'title'      => esc_html__( 'User Friendly', 'busiprof' ),
						'text'       => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'busiprof' ),
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						'color'      => '#4caf50',
						),
						
						array(
						'icon_value' => 'fa-life-ring',
						'title'      => esc_html__( '24/7 Support', 'busiprof' ),
						'text'       => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'busiprof' ),
						'choice'    => 'customizer_repeater_icon',
						'open_new_tab' => 'no',
						'link'       => '#',
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						'color'      => '#5ca2df',
						),
						
					) );

				}
			}
		} else {
			$busiprof_service_content  = get_theme_mod( 'busiprof_service_content');
			if($busiprof_service_content==''){
			// Run this code section if user comes from lite to pro new.
			// Now here we decide user comes from old lit or new lite.
			$new_theme_data = get_option( 'theme_mods_busiprof','');
			if(isset($new_theme_data['busiprof_service_content'])){
			// Run this code section if use comes from lite new to pro new
				$page = get_option( 'theme_mods_busiprof','');
				foreach($page as $key => $value) {
					if($key == 'busiprof_service_content'){
						set_theme_mod( 'busiprof_service_content', $value );
					}
				}
			} else {
			// Run this code section if use comes from lite old to pro new
				$service = get_option('busiprof_theme_options');
				$busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
				if ( ! empty( $busiprof_service_content_control ) ) {
					$busiprof_service_content_control->default = json_encode( array(
						array(
						'icon_value' => isset($service['service_icon_one'])? $service['service_icon_one']:'',
						'image_url'	 => isset($service['service_image_one'])? $service['service_image_one']:'',
						'title'      => isset($service['service_title_one'])? $service['service_title_one']:'',
						'text'       => isset($service['service_text_one'])? $service['service_text_one']:'',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						'color'      => '#e91e63',
						),
						array(
						'icon_value' => isset($service['service_icon_two'])? $service['service_icon_two']:'',
						'image_url'	 => isset($service['service_image_two'])? $service['service_image_two']:'',
						'title'      => isset($service['service_title_two'])? $service['service_title_two']:'',
						'text'       => isset($service['service_text_two'])? $service['service_text_two']:'',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						'color'      => '#00bcd4',
						),
						array(
						'icon_value' => isset($service['service_icon_three'])? $service['service_icon_three']:'',
						'image_url'	 => isset($service['service_image_three'])? $service['service_image_three']:'',
						'title'      => isset($service['service_title_three'])? $service['service_title_three']:'',
						'text'       => isset($service['service_text_three'])? $service['service_text_three']:'',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						'color'      => '#4caf50',
						),
						
						array(
						'icon_value' => isset($service['service_icon_four'])? $service['service_icon_four']:'',
						'image_url'	 => isset($service['service_image_four'])? $service['service_image_four']:'',
						'title'      => isset($service['service_title_four'])? $service['service_title_four']:'',
						'text'       => isset($service['service_text_four'])? $service['service_text_four']:'',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						'color'      => '#4caf50',
						),
					
						) );
				}
			}
		}	
	}
	}
	
add_action( 'customize_register', 'busiprof_service_default_customize_register' );
	
endif;

// busiprof default service content data
if ( ! function_exists( 'busiprof_testimonial_default_customize_register' ) ) :
add_action( 'customize_register', 'busiprof_testimonial_default_customize_register' );
function busiprof_testimonial_default_customize_register( $wp_customize ){
	// Busiprof default testimonial data.
		
		if(get_option('busiprof_theme_options')=='')
		{	
	
			if(get_option('busiprof_pro_theme_options')!=''){
			$busiprof_testimonial_content_control = $wp_customize->get_setting( 'busiprof_testimonial_content' );
			if ( ! empty( $busiprof_testimonial_content_control ) ) {
			
			$args = array( 'post_type' => 'busiprof_testimonial') ; 	
						$service = new WP_Query( $args ); 
						if( $service->have_posts() )
							{
								$busiprof_testimonial_content_control->default = json_encode( array() );
								while ( $service->have_posts() ) : $service->the_post();
									$pro_testimonial_data[] = array(
									'title'      => get_the_title(),
									'text'       => get_post_meta( get_the_ID(), 'testimonial_desc', true ),
									'designation' => get_post_meta( get_the_ID(), 'author_designation', true ),
									'link'       => get_post_meta( get_the_ID(), 'author_link', true ),
									'image_url'  => get_the_post_thumbnail_url(),
									'open_new_tab' => get_post_meta( get_the_ID(),'author_link_target', true ),
									'id'    => 'customizer_repeater_56d7ea7f40b96',
								);
								endwhile; 
								$busiprof_testimonial_content_control->default = json_encode($pro_testimonial_data);
							}
		
				}} else {
			$busiprof_testimonial_content_control = $wp_customize->get_setting( 'busiprof_testimonial_content' );
			if ( ! empty( $busiprof_testimonial_content_control ) ) 
			{
				$busiprof_testimonial_content_control->default = json_encode( array(
					array(
					'title'      => esc_html__( 'Natalie Portman', 'busiprof' ),
					'text'       => esc_html__( 'We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...', 'busiprof' ),
					'designation' => '(Sales & Marketing)',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/item11.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					
					),
					array(
					'title'      => esc_html__( 'Robert Johnson', 'busiprof' ),
					'text'       => esc_html__( 'We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...', 'busiprof' ),
					'designation' => '(CEO & Founder)',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/item12.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b97',
					),
					array(
					'title'      => esc_html__( 'Annah Doe', 'busiprof' ),
					'text'       => esc_html__( 'We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...', 'busiprof' ),
					'designation' => '(Team Leader)',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/item9.jpg',
					'id'         => 'customizer_repeater_56d7ea7f40b98',
					'open_new_tab' => 'no',
					),
					array(
					'title'      => esc_html__( 'Charlie Sun', 'busiprof' ),
					'text'       => esc_html__( 'We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...', 'busiprof' ),
					'designation' => '(Sales Executive)',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/item10.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b98',
					),
					
				) );

			}
				}
		} else {
			$busiprof_testimonial_content  = get_theme_mod( 'busiprof_testimonial_content');
			if($busiprof_testimonial_content==''){
			$testimonial_data = get_option( 'theme_mods_busiprof','');
			if(isset($testimonial_data['busiprof_testimonial_content'])){
				foreach($testimonial_data as $key => $value) {
				  if($key == 'busiprof_testimonial_content'){
					 set_theme_mod( 'busiprof_testimonial_content', $value );
				  }
				}
			} else {
				$old_testimonial_data = get_option('busiprof_theme_options');
				$busiprof_testimonial_content_control = $wp_customize->get_setting( 'busiprof_testimonial_content' );
				if ( ! empty( $busiprof_testimonial_content_control ) ) {
					$busiprof_testimonial_content_control->default = json_encode( array(
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
}
}
endif;
