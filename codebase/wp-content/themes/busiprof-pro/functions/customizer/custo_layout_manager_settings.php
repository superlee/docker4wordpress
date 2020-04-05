<?php 
function busiprof_home_page_manager_settings( $wp_customize ){
	
	/* section manager section */
	
	$wp_customize->add_section( 'homepage_layout_manager_section' , 
	
	array(
	
		'title'      => __('Theme Layout Manager', 'busiprof'),
		
		'priority'   => 130,
		
   	) );
		
		// section 1

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section1]', array( 'default' => 'slider' , 'type'=>'option'  ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section1]', 

			array(

				'label'    => __( 'Section 1', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));

		

		// section 2

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section2]', array( 'default' => 'Service Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section2]', 

			array(

				'label'    => __('Section 2','busiprof'),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));

		

		// section 3

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section3]', array( 'default' => 'Project Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section3]', 

			array(

				'label'    => __( 'Section 3', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));
		
		
		// section 4

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section4]', array( 'default' => 'Blog Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section4]', 

			array(

				'label'    => __( 'Section 4', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));

		

		// section 5

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section5]', array( 'default' => 'Team Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section5]', 

			array(

				'label'    => __( 'Section 5', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));
		
		// section 6

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section6]', array( 'default' => 'Testimonials Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section6]', 

			array(

				'label'    => __( 'Section 6', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));

		

		// section 7

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section7]', array( 'default' => 'Client Strip' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section7]', 

			array(

				'label'    => __( 'Section 7', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),
					
					'Blog Section' => __('Blog section','busiprof'),
					
					'Team Section' => __('Team section','busiprof'),

					'Testimonials Section'=> __( 'Testimonials section', 'busiprof' ),

					'Client Strip'=> __( 'Client slider', 'busiprof' ),

				)

		));
}
add_action( 'customize_register', 'busiprof_home_page_manager_settings' );