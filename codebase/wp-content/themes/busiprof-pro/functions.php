<?php 

	/**Includes reqired resources here**/
	define('BUSI_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('BUSI_TEMPLATE_DIR',get_template_directory());
	define('BUSI_THEME_FUNCTIONS_PATH',BUSI_TEMPLATE_DIR.'/functions');

	require_once('theme_setup_data.php');

	//Files for custom - defaults menus
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/busiprof_nav_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/woo/woocommerce.php' );
	require( BUSI_THEME_FUNCTIONS_PATH .'/font/font.php' );


	// Theme functions file including
	require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/script.php');
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/custom-widgets.php' ); // for footer widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-widget-contact.php' ); // for custom contact widget 
	require( BUSI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); // for custom contact widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-latest-widget.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-header-widget.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');

	// customizer files include
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_general_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_sections_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_template_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_post_slugs_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_layout_manager_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_post_meta_setting.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_theme_style.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/customizer.php' );
	require( BUSI_TEMPLATE_DIR . '/css/custom-light.php');
	
	require( BUSI_THEME_FUNCTIONS_PATH . '/wpml-pll/functions.php' );
	
	require( BUSI_THEME_FUNCTIONS_PATH . '/pagination/webriti_pagination.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/post-type/custom-post-type.php' );// for cpt
	require( BUSI_THEME_FUNCTIONS_PATH . '/meta-box/post-meta.php' );// for meta box
	require( BUSI_THEME_FUNCTIONS_PATH . '/taxonomies/taxonomie.php' );// for taxonomie
	
	
	
	//code for shortcode .....................
	define( 'WPEX_FRAMEWORK_DIR', get_template_directory_uri().'/functions' ); 
	
	//theme ckeck plugin required 	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	
	//content width
	if ( ! isset( $content_width ) ) $content_width = 750;	


	if ( ! function_exists( 'busiporf_setup' ) ) :
	function busiporf_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'busiprof', get_template_directory() . '/lang' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	// supports featured image
	add_theme_support( 'post-thumbnails' );
	
	//Custom Background
	add_theme_support( 'custom-background' );
	
	// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
	//Added Woocommerce Galllery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'busiprof' )
	) );
	
	
} // busiporf_setup
endif;
	
	add_action( 'after_setup_theme', 'busiporf_setup' );
	
// custom background
function custom_background_function()
{
	$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() ); 
	$page_bg_image_url = $current_options['back_image'];
	if($page_bg_image_url!='')
	{
	echo '<style>body.boxed{ background-image:url("'.BUSI_TEMPLATE_DIR_URI.'/images/bg-pattern/'.$page_bg_image_url.'");}</style>';
	}
}
add_action('wp_head','custom_background_function',10,0);


add_action( 'after_switch_theme', 'busiprof_import_theme_mods_from_busiprof_child_themes' );

/**
* Import theme mods when switching from a Busiprof child theme to Busiprof Pro
*/
function busiprof_import_theme_mods_from_busiprof_child_themes() {

    // Get the name of the previously active theme.
    $previous_theme = strtolower( get_option( 'theme_switched' ) );

    if ( ! in_array(
        $previous_theme, array(
            'vdperanto',
			'vdequator',
			'lazyprof',
			'arzine',
        )
    ) ) {
        return;
    }

    // Get the theme mods from the previous theme.
    $previous_theme_content = get_option( 'theme_mods_' . $previous_theme );

    if ( ! empty( $previous_theme_content ) ) {
        foreach ( $previous_theme_content as $previous_theme_mod_k => $previous_theme_mod_v ) {
            set_theme_mod( $previous_theme_mod_k, $previous_theme_mod_v );
        }
    }
}


if(get_option('busiprof_pro_theme_options') ==''){

if(get_option('busiprof_theme_options')!=''){
	
	$status = get_option('busiprof-migration-status','no');
	
	
	if($status == 'no'){

		$old_theme_project = get_option('busiprof_theme_options');
		
		if(isset($old_theme_project['project_title_one'])){
			$post_id = wp_insert_post(
			array (
		   'post_type' => 'busiprof_project',
		   'post_title' => $old_theme_project['project_title_one'],
		   'post_status' => 'publish',
		));
		
		
		if(isset($old_theme_project['project_thumb_one'])){

			$filename = $old_theme_project['project_thumb_one'];

			$filetype = wp_check_filetype( basename( $filename ), null );

			$wp_upload_dir = wp_upload_dir();

			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);

			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			set_post_thumbnail( $post_id, $attach_id );
			
		}

        if(isset($old_theme_project['project_text_one'])){		
		
		    update_post_meta($post_id, 'project_title_description', sanitize_text_field($old_theme_project['project_text_one']));
			
		}
		
		if(isset($old_theme_project['project_one_url'])){
		
		    update_post_meta($post_id, 'project_link', sanitize_text_field($old_theme_project['project_one_url']));
		
		}

		$table_name = $wpdb->prefix . "term_relationships";
		
        $wpdb->insert($table_name, array('object_id' => $post_id, 'term_taxonomy_id' => 2 ,'term_order' => 0) );

		}
		if(isset($old_theme_project['project_title_two'])){
			$post_id = wp_insert_post(
			array (
		   'post_type' => 'busiprof_project',
		   'post_title' => $old_theme_project['project_title_two'],
		   'post_status' => 'publish',
		));
		
		
		if(isset($old_theme_project['project_thumb_two'])){
			
			$filename = $old_theme_project['project_thumb_two'];
			$filetype = wp_check_filetype( basename( $filename ), null );
			$wp_upload_dir = wp_upload_dir();
			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			set_post_thumbnail( $post_id, $attach_id );
			
		}
			
			
		if(isset($old_theme_project['project_text_two'])){
			
			update_post_meta($post_id, 'project_title_description', sanitize_text_field($old_theme_project['project_text_two']));
			
		}
		
		if(isset($old_theme_project['project_two_url'])){
		
		    update_post_meta($post_id, 'project_link', sanitize_text_field($old_theme_project['project_two_url']));
		
		}
		
		$table_name = $wpdb->prefix . "term_relationships";
		
        $wpdb->insert($table_name, array('object_id' => $post_id, 'term_taxonomy_id' => 2 ,'term_order' => 0) ); 
		
		}
		if(isset($old_theme_project['project_title_three'])){
			$post_id = wp_insert_post(
			array (
		   'post_type' => 'busiprof_project',
		   'post_title' => $old_theme_project['project_title_three'],
		   'post_status' => 'publish',
		));
		
		if(isset($old_theme_project['project_thumb_three'])){
		
			$filename = $old_theme_project['project_thumb_three'];
			$filetype = wp_check_filetype( basename( $filename ), null );
			$wp_upload_dir = wp_upload_dir();
			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			set_post_thumbnail( $post_id, $attach_id );
		
		}
		
		if(isset($old_theme_project['project_text_three'])){
		
		    update_post_meta($post_id, 'project_title_description', sanitize_text_field($old_theme_project['project_text_three']));
		
		}
		
		if(isset($old_theme_project['project_three_url'])){
		
		    update_post_meta($post_id, 'project_link', sanitize_text_field($old_theme_project['project_three_url']));
		
		}
		
		$table_name = $wpdb->prefix . "term_relationships";
		
        $wpdb->insert($table_name, array('object_id' => $post_id, 'term_taxonomy_id' => 2 ,'term_order' => 0) ); 
		
		
		}
		if(isset($old_theme_project['project_title_four'])){
			$post_id = wp_insert_post(
			array (
		   'post_type' => 'busiprof_project',
		   'post_title' => $old_theme_project['project_title_four'],
		   'post_status' => 'publish',
		));
		
		if(isset($old_theme_project['project_thumb_four'])){
		
			$filename = $old_theme_project['project_thumb_four'];
			$filetype = wp_check_filetype( basename( $filename ), null );
			$wp_upload_dir = wp_upload_dir();
			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			set_post_thumbnail( $post_id, $attach_id );
		
		}
		
		
		if(isset($old_theme_project['project_text_four'])){
		
		    update_post_meta($post_id, 'project_title_description', sanitize_text_field($old_theme_project['project_text_four']));

		}
		
		if(isset($old_theme_project['project_four_url'])){
		
		    update_post_meta($post_id, 'project_link', sanitize_text_field($old_theme_project['project_four_url']));
		
		}
		
		$table_name = $wpdb->prefix . "term_relationships";
		
        $wpdb->insert($table_name, array('object_id' => $post_id, 'term_taxonomy_id' => 2 ,'term_order' => 0) );  
		
		
		}

	update_option('busiprof-migration-status','yes');
	
		}
		
		$old_theme_project = get_option('busiprof_theme_options');
		
		if(isset($old_theme_project['project_title_one']) || isset($old_theme_project['project_title_two']) || isset($old_theme_project['project_title_three']) || isset($old_theme_project['project_title_four'])){
		
		$wpdb->update( 
			'wp_term_taxonomy', 
			array( 
				'count' => '4'	// integer (number) 
			), 
			array( 'term_id' => 2 ), 
			array( 
				'%d'	// value2
			), 
			array( '%d' ) 
			);
	
			
		}
		

}

}