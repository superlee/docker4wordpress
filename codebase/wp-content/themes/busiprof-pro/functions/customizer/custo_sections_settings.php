<?php
$repeater_path = trailingslashit( get_template_directory() ) . '/functions/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}
function busiprof_sections_settings( $wp_customize ){
	
	$old_theme_project = get_option('busiprof_theme_options');

	    // customizer data migrate from lite to pro theme
		
		if(isset($old_theme_project['slider_head_title'])){  $intro_tag_line = $old_theme_project['slider_head_title'];	}else{$intro_tag_line = __('Busiprof: the perfect WordPress theme for an app and web developer', 'busiprof' );}
		
		if(isset($old_theme_project['service_heading_one'])){$service_tag_line = $old_theme_project['service_heading_one'];}else{$service_tag_line = __('Awesome Services','busiprof');}
		
		if(isset($old_theme_project['service_tagline'])){$service_tag_desciption = $old_theme_project['service_tagline'];}else{$service_tag_desciption = __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof');}
		
		if(isset($old_theme_project['service_button_value'])){$service_readmore_button = $old_theme_project['service_button_value'];}else{$service_readmore_button = __('More Services','busiprof');}
		
		if(isset($old_theme_project['service_link_btn'])){$service_readmore_link = $old_theme_project['service_link_btn'];}else{$service_readmore_link = '#';}
		
		if(isset($old_theme_project['protfolio_tag_line'])){$project_tag_line = $old_theme_project['protfolio_tag_line'];}else{$project_tag_line = __('Recent Projects','busiprof');}
		
		if(isset($old_theme_project['protfolio_description_tag'])){$project_tag_desciption = $old_theme_project['protfolio_description_tag'];}else{$project_tag_desciption = __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof');}
		
		if(isset($old_theme_project['recent_blog_title'])){$blog_head = $old_theme_project['recent_blog_title'];}else{$blog_head = __('Recent Blog','busiprof');}
		
		if(isset($old_theme_project['recent_blog_description'])){$blog_tagline = $old_theme_project['recent_blog_description'];}else{$blog_tagline = __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof');}	
		
		if(isset($old_theme_project['testimonials_title'])){$testimonial_head = $old_theme_project['testimonials_title'];}else{ $testimonial_head = __('Our Testimonials','busiprof');}
		
	    if(isset($old_theme_project['testimonials_text'])){$testimonial_tagline = $old_theme_project['testimonials_text'];}else{$testimonial_tagline = __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof');}
		
		if(isset($old_theme_project['testimonials_text'])){$testimonial_tagline = $old_theme_project['testimonials_text'];}else{$testimonial_tagline = __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof');}

/* Sections Settings */
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Homepage section settings', 'busiprof'),
	) );
	
	/* Banner strip section */
	$wp_customize->add_section( 'bannerstrip_section' , array(
		'title'      => __('Infobar settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 0,
   	) );
	
		// Enable banner strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_banner_strip_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_banner_strip_enabled]' , array(
				'label'    => __( 'Enable Infobar', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// Banner strip text
		$wp_customize->add_setting( 'busiprof_pro_theme_options[intro_tag_line]', array( 'default' => $intro_tag_line, 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[intro_tag_line]', 
			array(
				'label'    => __('Infobar text', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'textarea',
		));
		
	/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => __('Slider settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 1,
   	) );
		
		// Enable slider
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_page_slider_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_page_slider_enabled]' , array(
				'label'    => __( 'Enable slider', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		
		
		if ( class_exists( 'Busiprof_Repeater' ) ) {
			$wp_customize->add_setting( 'busiprof_slider_content', array(
			) );

			$wp_customize->add_control( new Busiprof_Repeater( $wp_customize, 'busiprof_slider_content', array(
				'label'                             => esc_html__( 'Slider Content', 'busiprof' ),
				'section'                           => 'slider_section',
				'add_field_label'                   => esc_html__( 'Add new slide', 'busiprof' ),
				'item_name'                         => esc_html__( 'Slide', 'busiprof' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
		
		// animation
		$wp_customize->add_setting( 'busiprof_pro_theme_options[animation]', array( 'default' => 'slide' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[animation]', 
			array(
				'label'    => __( 'Animation', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'slide'=>__('slide', 'busiprof'),
					'fade'=>__('fade', 'busiprof')
				)
		));
		
		// Direction
		$wp_customize->add_setting( 'busiprof_pro_theme_options[slide_direction]', array( 'default' => 'horizontal' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[slide_direction]', 
			array(
				'label'    => __( 'Direction', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'horizontal'=>__('horizontal', 'busiprof'),
					'vertical'=>__('vertical', 'busiprof')
				)
		));
		
		// animation speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[animation_speed]', array( 'default' => 1000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[animation_speed]', 
			array(
				'label'    => __( 'Animation speed', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
		
		// slide show speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[slideshow_speed]', array( 'default' => 2000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[slideshow_speed]', 
			array(
				'label'    => __('Slideshow speed', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
	
	
	/* Services section */
	$wp_customize->add_section( 'services_section' , array(
		'title'      => __('Service settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 1,
	) );
		
		
		// Enable service more btn
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_service_section_enabled]' , array( 'default' => 'on' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_service_section_enabled]' , array(
				'label'    => __( 'Enable Services on homepage', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		
		// service section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_tag_line]', 
		array( 'default' => $service_tag_line, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_tag_line]', 
			array(
				'label'    => __('Title', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		// service section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_tag_desciption]', array( 'default' => $service_tag_desciption, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_tag_desciption]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'textarea',
		));
		
		// service layout
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_layout]' , array(
		'default' => 3,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		) );
		$wp_customize->add_control('busiprof_pro_theme_options[service_layout]' , array(
		'label'          => __('Select column layout', 'busiprof' ),
		'section'        => 'services_section',
		'type'           => 'select',
		'choices' => array(
			12 => 1,
			6 => 2,
			4 => 3,
			3 => 4,
		) ) );
		
		
		if ( class_exists( 'Busiprof_Repeater' ) ) {
			$wp_customize->add_setting( 'busiprof_service_content', array(
			) );

			$wp_customize->add_control( new Busiprof_Repeater( $wp_customize, 'busiprof_service_content', array(
				'label'                             => esc_html__( 'Service content', 'busiprof' ),
				'section'                           => 'services_section',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add new Service', 'busiprof' ),
				'item_name'                         => esc_html__( 'Service', 'busiprof' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_color_control' => true,
				'customizer_repeater_image_control' => true,
				) ) );
		}
		
		
		// Services Read More Text
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_readmore_button]', array( 'default' =>$service_readmore_button, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_readmore_button]', 
			array(
				'label'    => __( 'Button Text', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		// Services Read More Button URL
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_readmore_link]', array( 'default' => $service_readmore_link, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_readmore_link]', 
			array(
				'label'    => __( 'Button Link', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		//Service Read More Button target
		$wp_customize->add_setting('busiprof_pro_theme_options[service_readmore_link_target]',
		array( 'default' => true, 
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

		$wp_customize->add_control(
		'busiprof_pro_theme_options[service_readmore_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','busiprof'),
			'section' => 'services_section',
		)
	);
	
	
	
	/* Project Section */
	$wp_customize->add_section( 'project_section' , array(
			'title'      => __('Project settings', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 4,
		) );
		
		// Enable banner strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_project_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_project_section_enabled]' , array(
				'label'    => __( 'Enable Home Project section', 'busiprof' ),
				'section'  => 'project_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// project section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_tag_line]', 
		array( 'default' => $project_tag_line, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_tag_line]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'project_section',
				'type'     => 'text',
		));
		
		// project section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_tag_desciption]', 
		array( 'default' => $project_tag_desciption, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_tag_desciption]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'project_section',
				'type'     => 'textarea',
		));	
		
		
	/* Blog Section */
	$wp_customize->add_section( 'blog_section' , array(
			'title'      => __('Recent Blog setting', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 5,
		) );
		
		// Enable Recent Blog
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_recentblog_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_recentblog_section_enabled]' , array(
				'label'    => __( 'Enable Home Blog section', 'busiprof' ),
				'section'  => 'blog_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
		
		
		// blog section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[blog_head]', array( 'default' => $blog_head, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[blog_head]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'blog_section',
				'type'     => 'text',
		));
		
		// blog section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[blog_tagline]', array( 'default' => $blog_tagline, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[blog_tagline]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'blog_section',
				'type'     => 'textarea',
		));
		
		
	/* Team Section */
	$wp_customize->add_section( 'team_section' , array(
			'title'      => __('Team setting', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 6,
		) );
		
		// Enable Team section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_team_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_team_section_enabled]' , array(
				'label'    => __( 'Enable Home Team section', 'busiprof' ),
				'section'  => 'team_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// testmonial section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[team_head]', 
		array( 'default' => __('Meet The Team', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[team_head]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'team_section',
				'type'     => 'text',
		));
		
		// testmonial section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[team_tagline]', array( 'default' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[team_tagline]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'team_section',
				'type'     => 'textarea',
		));
		
		//Number of team
	
	$wp_customize->add_setting(
    'busiprof_pro_theme_options[team_list]',
    array(
        'default' => 4,
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'busiprof_pro_theme_options[team_list]',
    array(
        'type' => 'select',
        'label' => __('Number of team on team section','busiprof'),
        'section' => 'team_section',
		'choices' => array(2=>2,4=>4,6=>6,8=>8,10=>10,12=>12,14=>14,16=>16,18=>18,20=>20,-1=>'Show all'),
		));
		
		
		
		//Add Testimonial
		class WP_team_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=busiprof_team" class="button"  target="_blank"><?php _e( 'Click here to add Team', 'busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'team',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_team_Customize_Control( $wp_customize, 'team', array(	
			'section' => 'team_section',
		))
	);
		
		
		// Enable Team Background Image
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_team_back_image_enabled]' , array( 'default' => 'off' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_team_back_image_enabled]' , array(
				'label'    => __( 'Enable background image', 'busiprof' ),
				'section'  => 'team_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// Team Background image
		$wp_customize->add_setting( 'busiprof_pro_theme_options[team_background_image]', array(
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'busiprof_pro_theme_options[team_background_image]', array(
		  'label'    => __( 'Background Image', 'busiprof' ),
		  'section'  => 'team_section',
		  'settings' => 'busiprof_pro_theme_options[team_background_image]',
		) ) );
		
		// Image overlay
		$wp_customize->add_setting( 'busiprof_pro_theme_options[team_image_overlay]', array(
			'default' => true,
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		) );
		
		$wp_customize->add_control('busiprof_pro_theme_options[team_image_overlay]', array(
			'label'    => __( 'Enable background image overlay', 'busiprof' ),
			'section'  => 'team_section',
			'type' => 'checkbox',
		) );
		
		// Team Background attachment
		$wp_customize->add_setting( 'busiprof_pro_theme_options[team_image_attachment]', array(
			'default' => 'fixed',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		) );
		
		$wp_customize->add_control('busiprof_pro_theme_options[team_image_attachment]', array(
			'label'    => __( 'Background attachment', 'busiprof' ),
			'section'  => 'team_section',
			'type' => 'select',
			'choices' => array(
				'fixed'=>'fixed',
				'scroll'=>'scroll',
		) ) );
		
	/* Testimonial Section */
	$wp_customize->add_section( 'testimonial_section' , array(
			'title'      => __('Testimonial settings', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 7,
		) );
		
		// Enable Testimonial strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_testimonial_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_testimonial_section_enabled]' , array(
				'label'    => __( 'Enable Home Testimonial section', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// testmonial section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[testimonial_head]', 
		array( 'default' => $testimonial_head, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[testimonial_head]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'text',
		));
		
		// testmonial section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[testimonial_tagline]', array( 'default' => $testimonial_tagline, 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[testimonial_tagline]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'textarea',
		));	
		
		
		
		// Testimonial show speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[testimonial_speed]', array( 'default' => 3000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[testimonial_speed]', 
			array(
				'label'    => __('Duration', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'select',
				'choices'=>array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
		
		if ( class_exists( 'Busiprof_Repeater' ) ) {
			$wp_customize->add_setting( 'busiprof_testimonial_content', array(
			) );

			$wp_customize->add_control( new Busiprof_Repeater( $wp_customize, 'busiprof_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial content', 'busiprof' ),
				'section'                           => 'testimonial_section',
				'add_field_label'                   => esc_html__( 'Add new Testimonial', 'busiprof' ),
				'item_name'                         => esc_html__( 'Testimonial', 'busiprof' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_designation_control' => true,
				) ) );
		}
		
		
	/* Client Slider Section */
	$wp_customize->add_section( 'clientslider_section' , array(
		'title'      => __('Client Slider settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 8,
   	) );
	
		// Enable Client Strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_client_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_client_section_enabled]' , array(
				'label'    => __( 'Enable Home Client section', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
	
	
		// Client section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_title]', array( 'default' => __('Meet our clients','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_title]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'text',
		));
		
		
		// Client section Description
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_desc]', array( 'default' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_desc]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'textarea',
		));
		
		// client to show
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_total]', array( 'default' => 5 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_total]', 
			array(
				'label'    => __( 'Number of shown clients', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'select',
				'choices'=>array(
					'2'=>'2',
					'3'=>'3',
					'4'=>'4',
					'5'=>'5'
				)
		));
		
		// Client Strip slide Speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_slide_speed]', array( 'default' => 2000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_slide_speed]', 
			array(
				'label'    => __( 'Animation speed', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'select',
				'choices' => array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
		
		//link
		class WP_client_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=busiprof_clientstrip" class="button"  target="_blank"><?php _e( 'Click here to add client', 'busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'pro_cleint',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'pro_cleint', array(	
			'section' => 'clientslider_section',
		))
	);	
}
add_action( 'customize_register', 'busiprof_sections_settings' );

/**
 * Add selective refresh for Front page section section controls.
 */
function busiprof_register_home_section_partials( $wp_customize ){

	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[intro_tag_line]', array(
		'selector'            => '.header-title h2',
		'settings'            => 'busiprof_pro_theme_options[intro_tag_line]',
	
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[service_tag_line]', array(
		'selector'            => '.service .section-title .section-heading',
		'settings'            => 'busiprof_pro_theme_options[service_tag_line]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[service_tag_desciption]', array(
		'selector'            => '.service .section-title p',
		'settings'            => 'busiprof_pro_theme_options[service_tag_desciption]',
	
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options', array(
		'selector'            => '.service .busiprof-features-content',
		'settings'            => 'busiprof_pro_theme_options',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[service_readmore_button]', array(
		'selector'            => '.btn-wrap',
		'settings'            => 'busiprof_pro_theme_options[service_readmore_button]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[project_tag_line]', array(
		'selector'            => '.home .portfolio .section-title h1',
		'settings'            => 'busiprof_pro_theme_options[project_tag_line]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[project_tag_desciption]', array(
		'selector'            => '.home .portfolio .section-title p',
		'settings'            => 'busiprof_pro_theme_options[project_tag_desciption]',
	
	) );
	
	
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[blog_head]', array(
		'selector'            => '.home-post-latest .section-heading',
		'settings'            => 'busiprof_pro_theme_options[blog_head]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[blog_tagline]', array(
		'selector'            => '.home-post-latest .section-title p, .section-title-small p',
		'settings'            => 'busiprof_pro_theme_options[blog_tagline]',
	
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[team_head]', array(
		'selector'            => '.bg-color .section-heading',
		'settings'            => 'busiprof_pro_theme_options[team_head]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[team_tagline]', array(
		'selector'            => '.bg-color .section-title p',
		'settings'            => 'busiprof_pro_theme_options[team_tagline]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[testimonial_head]', array(
		'selector'            => '.testimonial-scroll .section-title h1',
		'settings'            => 'busiprof_pro_theme_options[testimonial_head]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[testimonial_tagline]', array(
		'selector'            => '.testimonial-scroll .section-title p',
		'settings'            => 'busiprof_pro_theme_options[testimonial_tagline]',
	) );
	
	
	
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[client_title]', array(
		'selector'            => '.clients .section-title .section-heading',
		'settings'            => 'busiprof_pro_theme_options[client_title]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[client_desc]', array(
		'selector'            => '.clients .section-title p',
		'settings'            => 'busiprof_pro_theme_options[client_desc]',
	
	) );
}

add_action( 'customize_register', 'busiprof_register_home_section_partials' );