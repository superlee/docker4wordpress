<?php 
function busiprof_general_settings( $wp_customize ){
	
	    $old_theme_project = get_option('busiprof_theme_options');
		
		if(isset($old_theme_project['upload_image'])){  $upload_image = $old_theme_project['upload_image'];	}else{$upload_image = '';}
		
		if(isset($old_theme_project['width'])){  $width = $old_theme_project['width'];	}else{$width = '138';}
		
		if(isset($old_theme_project['height'])){  $height = $old_theme_project['height'];	}else{$height = '49';}
		
		if(isset($old_theme_project['enable_logo_text'])){  $enable_logo_text = $old_theme_project['enable_logo_text'];	}else{$enable_logo_text = false;}
		
		if(isset($old_theme_project['footer_copyright_text'])){$footer_copyright_text = $old_theme_project['footer_copyright_text'];}else{$footer_copyright_text = '<p>'.__('©2017 All Rights Reserved - Webriti. - Designed and Developed by','busiprof').'<a href="http://www.webriti.com/" target="_blank">'.__('Webriti','busiprof').'</a></p>';}

/* Home Page Panel */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => __('General settings', 'busiprof'),
	) );
	
	/* Front Page section */
	$wp_customize->add_section( 'front_page_section' , array(
		'title'      => __('Front page', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 0,
   	) );
	
		 // Enable Front Page
		$wp_customize->add_setting(
			'busiprof_pro_theme_options[front_page]', 
			array(
			'default' => 'yes',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		));
		
		$wp_customize->add_control(
			'busiprof_pro_theme_options[front_page]', 
			array(
				'label'    => __( 'Enable front page', 'busiprof' ),
				'section'  => 'front_page_section',
				'type'     => 'radio',
				'choices' => array(
					'yes'=>'ON',
					'no'=>'OFF'
				)
		));
		
	/* custom logo section */
	$wp_customize->add_section( 'logo_section' , array(
		'title'      => __('Header logo settings', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 1,
   	) );
	
		// Logo
		$wp_customize->add_setting( 'busiprof_pro_theme_options[upload_image]',array( 'default' => $upload_image ,'type' => 'option') );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'busiprof_pro_theme_options[upload_image]', array(
			'label'    => __( 'Upload logo', 'busiprof' ),
			'section'  => 'logo_section',
			'settings' => 'busiprof_pro_theme_options[upload_image]',
		) ) );
		
		// width
		$wp_customize->add_setting( 'busiprof_pro_theme_options[width]', array( 'default' => $width, 'type' => 'option'	) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[width]', 
			array(
				'label'    => __('Enter Logo Width', 'busiprof' ),
				'section'  => 'logo_section',
				'type'     => 'text',
		));
		
		// height
		$wp_customize->add_setting( 'busiprof_pro_theme_options[height]', array( 'default' => $height, 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[height]', 
			array(
				'label'    => __( 'Enter Logo Height', 'busiprof' ),
				'section'  => 'logo_section',
				'type'     => 'text',
		));
		
		
		// enable logo text
			$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_logo_text]' , array(
			'default' => $enable_logo_text,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('busiprof_pro_theme_options[enable_logo_text]' , array(
			'label'          => __( 'Enable logo text', 'busiprof' ),
			'section'        => 'logo_section',
			'type'           => 'checkbox'
		    ) );
		
	/* custom css section */
	$wp_customize->add_section( 'custom_css_section' , array(
		'title'      => __('Custom CSS', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 2,
   	) );
	
		// custom css
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_pro_custom_css]', array( 'default' => '' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_pro_custom_css]', 
			array(
				'label'    => __( 'Custom CSS', 'busiprof' ),
				'section'  => 'custom_css_section',
				'type'     => 'textarea',
		));
		
	/* footer section */
	$wp_customize->add_section( 'footer_copy_section' , array(
		'title'      => __('Footer copyright settings', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 3,
   	) );
	
		// copyright text
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_copyright_text]', array( 'default' => $footer_copyright_text, 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_copyright_text]', 
			array(
				'label'    => __( 'Copyright text', 'busiprof' ),
				'section'  => 'footer_copy_section',
				'type'     => 'textarea',
		));
		
	/* social icon section */
	$wp_customize->add_section( 'social_icons_section' , array(
		'title'      => __('Social icons', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 4,
   	) );
	
		// Enable footer social icons
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_social_media_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_social_media_enabled]' , array(
				'label'    => __( "Enable footer's social icons", "busiprof" ),
				'section'  => 'social_icons_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		// twitter icon
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_twitter_link]', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_twitter_link]', 
			array(
				'label'    => __( 'Twitter URL', 'busiprof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
		));
		
		// facebook icon
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_facebook_link]', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_facebook_link]', 
			array(
				'label'    => __( 'Facebook URL', 'busiprof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
		));
		
		// linkedin icon
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_linkedin_link]', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_linkedin_link]', 
			array(
				'label'    => __( 'LinkedIn URL', 'busiprof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
		));
		
		
		// Googel-plus icon
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_google_link]', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_google_link]', 
			array(
				'label'    => __( 'GooglePlus URL', 'busiprof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
		));
		
		
		// Skype icon
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_skype_link]', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_skype_link]', 
			array(
				'label'    => __( 'Skype URL', 'busiprof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
		));

		// Instagram icon
		$wp_customize->add_setting( 'busiprof_pro_theme_options[footer_instagram_link]', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[footer_instagram_link]', 
			array(
				'label'    => __( 'Instagram URL', 'busiprof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
		));
}
add_action( 'customize_register', 'busiprof_general_settings' );

/**
 * Add selective refresh for Front page section section controls.
 */
function busiprof_register_copyright_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[footer_copyright_text]', array(
		'selector'            => '.site-info .col-md-7 p',
		'settings'            => 'busiprof_pro_theme_options[footer_copyright_text]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[upload_image]', array(
		'selector'            => '.navbar-header a',
		'settings'            => 'busiprof_pro_theme_options[upload_image]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_pro_theme_options[footer_twitter_link]', array(
		'selector'            => '.site-info .col-md-5 .social',
		'settings'            => 'busiprof_pro_theme_options[footer_twitter_link]',
	
	) );
}

add_action( 'customize_register', 'busiprof_register_copyright_section_partials' );