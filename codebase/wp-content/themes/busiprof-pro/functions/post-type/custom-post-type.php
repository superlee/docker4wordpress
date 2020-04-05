<?php

$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

/************* Home slider custom post type ************************/
		//$slug_slide = $current_options['busiprof_slider_slug'];
		//$slug_service = $current_options['busiprof_service_slug'];
		$slug_project = $current_options['busiprof_project_slug'];
		//$slug_testimonial = $current_options['busiprof_testimonial_slug'];
		$slug_team = $current_options['busiprof_team_slug'];
		$slug_client = $current_options['busiprof_client_slug'];
		
		function busiprof_slider() {
			register_post_type( 'busiprof_slider');
}
add_action( 'init', 'busiprof_slider' );

/************* Home Service custom post type ************************/		
		function busiprof_service_type()
		{	register_post_type( 'busiprof_service');
}
add_action( 'init', 'busiprof_service_type' );

/************* Home project custom post type ************************/		
		function busiprof_project_type()
		{	register_post_type( 'busiprof_project',
				array(
				'labels' => array(
				'name' => __('Project', 'busiprof'),
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New', 'busiprof'),
                'add_new_item' => __('Add New Project','busiprof'),
				'edit_item' => __('Add New','busiprof'),
				'new_item' => __('New Link','busiprof'),
				'all_items' => __('All Projects','busiprof'),
				'view_item' => __('View Link','busiprof'),
				'search_items' => __('Search Links','busiprof'),
				'not_found' =>  __('No Links found','busiprof'),
				'not_found_in_trash' => __('No links found in trash','busiprof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => $GLOBALS['slug_project']),
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => BUSI_TEMPLATE_DIR_URI . '/images/project.png',
			)
	);
}
add_action( 'init', 'busiprof_project_type' );

/******************************Testimonial POST TYPE*******************************************************/
function busiprof_testimonials_type()
		{	register_post_type( 'busiprof_testimonial');
}
add_action( 'init', 'busiprof_testimonials_type' );


/******************************Team POST TYPE*******************************************************/
function busiprof_team_type()
		{	register_post_type( 'busiprof_team',
				array(
				'labels' => array(
				'name' => __('Our Team', 'busiprof'),
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New', 'busiprof'),
                'add_new_item' => __('Add New Member','busiprof'),
				'edit_item' => __('Add New','busiprof'),
				'new_item' => __('New Link','busiprof'),
				'all_items' => __('All Members','busiprof'),
				'view_item' => __('View Link','busiprof'),
				'search_items' => __('Search Links','busiprof'),
				'not_found' =>  __('No Links found','busiprof'),
				'not_found_in_trash' => __('No links found in trash','busiprof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => $GLOBALS['slug_team']),
				'menu_position' => 13,
				'public' => true,
				'menu_icon' => get_template_directory_uri() . '/images/team.png',
			)
	);
}
add_action( 'init', 'busiprof_team_type' );

/************* Home project custom post type ************************/		
		function busiprof_client_strip()
		{	register_post_type( 'busiprof_clientstrip',
				array(
				'labels' => array(
				'name' => __(' Client', 'busiprof'),
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New', 'busiprof'),
                'add_new_item' => __('Add New Client','busiprof'),
				'edit_item' => __('Add New','busiprof'),
				'new_item' => __('New Link','busiprof'),
				'all_items' => __('All Clients','busiprof'),
				'view_item' => __('View Link','busiprof'),
				'search_items' => __('Search Links','busiprof'),
				'not_found' =>  __('No Links found','busiprof'),
				'not_found_in_trash' => __('No links found in trash','busiprof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'menu_position' => 11,
				'rewrite' => array('slug' => $GLOBALS['slug_client']),
				'public' => true,
				'menu_icon' => BUSI_TEMPLATE_DIR_URI . '/images/satisfied-clients.jpg',
			)
	);
}
add_action( 'init', 'busiprof_client_strip' );
?>