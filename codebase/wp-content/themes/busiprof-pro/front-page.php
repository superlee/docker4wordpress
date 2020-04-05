<?php 
/* 	
* Template Name: Home
*/

$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

if (  $current_options['front_page'] != 'yes' ) 
{
	
	get_template_part('index');
	
}
else 
{
		get_header();
		 		
		$data = array();			

		$data[] = $current_options['busi_layout_section1'];

		$data[] = $current_options['busi_layout_section2'];

		$data[] = $current_options['busi_layout_section3'];

		$data[] = $current_options['busi_layout_section4'];

		$data[] = $current_options['busi_layout_section5'];
		
		$data[] = $current_options['busi_layout_section6'];

		$data[] = $current_options['busi_layout_section7'];

		
		if($data) 
		{
			foreach($data as $key=>$value)
			{
				switch($value) 
				{
					
					case 'slider': 
					
						/*====== get slider template ======*/ 
						
						get_template_part('index', 'slider') ;
						
					break;
					
					case 'Service Section': 	
					
						/*====== get service template ======*/ 
						
						get_template_part('index', 'service');
						
					
					break;
					
					
					case 'Project Section':
					
						/*====== get index project ======*/
						
						get_template_part('index', 'project');	
					
					break;
					
					
					case 'Blog Section':
					
						/*====== get index blog ======*/
						
						get_template_part('index', 'blog');	
					
					break;
					
					case 'Team Section':
					
						/*====== get index team ======*/
						
						get_template_part('index', 'team');	
					
					break;
					
					
					case 'Testimonials Section':
					
						/*====== get testimonial template ======*/ 
						
						get_template_part('index', 'testimonials');			
					
					break; 
					
					case 'Client Strip': 			
					
						/*====== get client template ======*/ 
						
						get_template_part('index', 'clientstrip');		
					
					break; 								
				}	
			}
		} 
		
		get_footer();
}