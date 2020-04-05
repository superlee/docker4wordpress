<?php 
function busiprof_post_slugs_settings( $wp_customize ){

	/* Post slug section */
	$wp_customize->add_section( 'custom_post_slug_section' , array(
		'title'      => __("SEO Friendly URL","busiprof"),
		'priority'       => 128,
   	) );
	
		// Projects Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_project_slug]', array( 'default' => 'busiprof-project' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_project_slug]', 
			array(
				'label'    => __( 'Project slug', 'busiprof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
		));
		
		// Projects Texonomy Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_project_texonomy_slug]', array( 'default' => 'project-category' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_project_texonomy_slug]', 
			array(
				'label'    => __( "Project’s category slug", "busiprof" ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
		));
		
		
		// Client Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_client_slug]', array( 'default' => 'busiprof-client' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_client_slug]', 
			array(
				'label'    => __( 'Client slug', 'busiprof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
		));
		
		
		// Team Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_team_slug]', array( 'default' => 'busiprof-team' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_team_slug]', 
			array(
				'label'    => __( 'Team slug', 'busiprof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
		));
		
class WP_amenities_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <p><?php _e( "After changing the slug, please don't forget to save the permalinks. Without saving them, the old permalinks will not be updated.","busiprof" ); ?></p>
    <?php
    }
}
		$wp_customize->add_setting( 'custom_label_slug' ,
			array(
				'capability'     => 'edit_theme_options',
				'type' => 'option',
			)	
		);
		$wp_customize->add_control( new WP_amenities_Customize_Control( $wp_customize, 'custom_label_slug', array(	
				'section' => 'custom_post_slug_section',
			))
		);
		
		
		class WP_slug_Customize_Control extends WP_Customize_Control {
			public $type = 'new_menu';
			/**
			* Render the control's content.
			*/
			public function render_content() {
			?>
			<a href="<?php bloginfo ( 'url' );?>/wp-admin/options-permalink.php" class="button"  target="_blank"><?php _e( 'Click here permalinks setting', 'busiprof' ); ?></a>
			<?php
			}
			}

			$wp_customize->add_setting(
				'slug',
				array(
					'capability'     => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)	
			);
			$wp_customize->add_control( new WP_slug_Customize_Control( $wp_customize, 'slug', array(	
					'section' => 'custom_post_slug_section',
				))
			);
		
		
}
add_action( 'customize_register', 'busiprof_post_slugs_settings' );