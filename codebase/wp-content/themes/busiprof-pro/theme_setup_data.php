<?php
/*---------------------------------------------------------------------------------*
 * @file           theme_stup_data.php
 * @package        Busiprof
 * @copyright      2013 Busiprof
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/theme_setup_data.php
 *	Admin  & front end defual data file 
 *-----------------------------------------------------------------------------------*/ 
 
function theme_data_setup()
{
		$template_uri = BUSI_TEMPLATE_DIR_URI. '/images/default/';	
		
		$old_theme_project = get_option('busiprof_theme_options');
		
		if(isset($old_theme_project['upload_image'])){  $upload_image = $old_theme_project['upload_image'];	}else{$upload_image = '';}
		
		if(isset($old_theme_project['width'])){  $width = $old_theme_project['width'];	}else{$width = '138';}
		
		if(isset($old_theme_project['height'])){  $height = $old_theme_project['height'];	}else{$height = '49';}
		
		if(isset($old_theme_project['enable_logo_text'])){  $enable_logo_text = $old_theme_project['enable_logo_text'];	}else{$enable_logo_text = false;}
		
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
		
		if(isset($old_theme_project['footer_copyright_text'])){$footer_copyright_text = $old_theme_project['footer_copyright_text'];}else{$footer_copyright_text = '<p>'.__('©2017 All Rights Reserved - Webriti. - Designed and Developed by','busiprof').'<a href="http://www.webriti.com/" target="_blank">'.__('Webriti','busiprof').'</a></p>';}
		
		
		$old_theme_portfolio_tepmlate = get_option('busiprof_pro_theme_options');
		
		if(isset($old_theme_portfolio_tepmlate['project_template_tag_line'])){  $new_portfolio_title = $old_theme_portfolio_tepmlate['project_template_tag_line'];	}else{$new_portfolio_title = __( 'Recent Projects', 'busiprof' );}
		
		if(isset($old_theme_portfolio_tepmlate['project_template_tag_desciption'])){  $new_portfolio_description = $old_theme_portfolio_tepmlate['project_template_tag_desciption'];}else{$new_portfolio_description = __( 'We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.', 'busiprof' );}
		
		
		return $busiprof_pro_theme_options = array(
		
			'front_page'  => 'yes',
			'upload_image'=> $upload_image,
			'width'=> $width,
			'height'=> $height,
			'enable_logo_text'=> $enable_logo_text,
			
			'upload_image_favicon'=>'',
			'home_banner_strip_enabled'=>'on',
			'intro_tag_line' => $intro_tag_line,
			
			'layout_selector' => 'wide',
			'back_image'=>'bg_img0.png',
			'theme_color'=> 'default.css',
			'link_color' => '#ee591f',
			'link_color_enable' => false,
			
			'home_page_slider_enabled'=>'on',			
			'home_service_section_enabled'=>'on',
			'home_project_section_enabled'=>'on',
			'home_testimonial_section_enabled'=>'on',
			'home_recentblog_section_enabled'=>'on',
			'home_client_section_enabled' => 'on',
			'contact_info_enabled' => 'on',
			'contact_google_map_enabled'=>'on',
			'contact_client_enabled' => 'on',
			'enable_team_section' => 'on',
			'enable_client_section' => 'on',
			'enable_testimonial_section_portfolio' => 'on',
			'enable_client_section_portfolio' => 'on',
			'enable_post_meta' => 'on',

			
			//Slide Heading								
			'animation' => 'slide',
			'slide_direction' => 'horizontal',
			'animation_speed' => '1000',
			'slideshow_speed' => '2000',
			
			'client_strip'=>'yes',
			'client_strip_slide_speed'=>'2000',
			'client_strip_total' =>5,
			'client_title' => __('Meet our clients','busiprof'),
			'client_desc' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof'),
			
			'busiprof_pro_custom_css' =>"",
			
			'footer_copyright_text'=> $footer_copyright_text,
			
			'footer_social_media_enabled'=>'on',
			'footer_twitter_link' =>"#",
			'footer_facebook_link' =>"#",
			'footer_linkedin_link' =>"#",
			'footer_google_link' => '#',
			'footer_skype_link' => '#',
			'footer_instagram_link' => '#',
			
			//Portfolio
			'protfolio_tag_line'=> __('Recent Projects','busiprof'),
			'protfolio_description_tag' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof'),
			
			
			//project with ctegory
			'project_with_category_tag_line'=> $new_portfolio_title,
			'project_with_category_tag_desciption' => $new_portfolio_description,
			
								
			//Service
			'slider_readmore'=>'#',
			'service_list' => 4,
			'service_layout' => 3,
			'service_tag_line'=> $service_tag_line,
			'service_tag_desciption'=> $service_tag_desciption,
			'read_more_btn_enabled' => 'on',
			'service_readmore_button'=> $service_readmore_button,
			'service_readmore_link'=> $service_readmore_link,
			'service_readmore_link_target' => true,
			
			//Project
			'project_tag_line'=> $project_tag_line,
			'project_tag_desciption'=> $project_tag_desciption,
			
			
			//Team
			'home_team_section_enabled' => 'on',
			'team_head' => __('Meet The Team','busiprof'),
			'team_tagline' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof'),
			'home_team_back_image_enabled' => 'off',
			'team_background_image' => '',
			'team_image_overlay' => true,
			'team_color_overlay' => true,
			'team_image_attachment' => 'fixed',
			'home_team_back_color_enabled' => 'off',
			'team_section_color' => '',
			'team_list' => 4,
			
			
		
			
			'testimonial_head' => $testimonial_head,
			'testimonial_tagline' => $testimonial_tagline,
			'testimonial_speed' => '3000',
			
			'blog_head' => $blog_head,
			'blog_tagline' => $blog_tagline,	
			'project_category_list'=>2,
			'project_per_page' => 4,
			
			
			'project_template_tag_line' => __('Recent Projects','busiprof'),
			'project_template_tag_desciption' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof'),
			
			'project_texonomy_tag_line' => __('Recent Project category','busiprof'),
			'project_texonomy_description_tag' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes and giving support.','busiprof'),
			
			//contact page settings
			'contact_address_1'=> '378 Kingston Court',
			'contact_address_2'=> 'West New York, NJ 07093',
			'contact_number'=>'973-960-4715',
			'contact_fax_number'=>'0276-758645',
			'contact_email'=>'info@busiprof.com',
			'contact_website'=>'https://www.busiprof.com',
			'google_map_url' => 'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
			
			//Post Type slug Options
			'busiprof_slider_slug' => 'busiprof-slider',
			'busiprof_service_slug' => 'busiprof-service',
			'busiprof_project_slug' => 'busiprof-project',
			'busiprof_testimonial_slug' => 'busiprof-testimonial',
			'busiprof_team_slug' => 'busiprof-team',
			'busiprof_client_slug' => 'busiprof-client',
			'busiprof_project_texonomy_slug' => 'project-category',
			
			//Taxonomy Archive Setting
			'taxonomy_project_list' => 2 ,
			
			// layout manager settings
			'busi_layout_section1' => 'slider',
			'busi_layout_section2' => 'Service Section',
			'busi_layout_section3' => 'Project Section',
			'busi_layout_section4' => 'Blog Section',
			'busi_layout_section5' => 'Team Section',
			'busi_layout_section6' => 'Testimonials Section',
			'busi_layout_section7' => 'Client Strip',
			
			// Archive page title
			'archive_prefix' => 'Archive',
			'category_prefix' => 'Category',
			'author_prefix' => 'All posts by',
			'tag_prefix'	=> 'Tag',
			'search_prefix'	=> 'Search results for',
			'project_prefix'	=> 'Project categories',
			'404_prefix'	=> '404',
			'shop_prefix'	=> 'Shop',
			
	);
		
}