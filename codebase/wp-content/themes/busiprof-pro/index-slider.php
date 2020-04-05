<?php 
$slide_options = get_theme_mod('busiprof_slider_content');

if(empty($slide_options))
{
	$lite_slider_data = get_option('busiprof_theme_options');
	$pro_slider_data = get_option('busiprof_pro_theme_options');
		if(!empty($pro_slider_data))
				{
					$args = array( 'post_type' => 'busiprof_slider') ; 	
					$slider = new WP_Query( $args ); 
					if( $slider->have_posts() )
						{
							while ( $slider->have_posts() ) : $slider->the_post();
								$pro_slider_data_old[] = array(
								'title'      => get_the_title(),
								'text'       => sanitize_text_field( get_post_meta( get_the_ID(),'image_description', true )),
								'button_text'      => sanitize_text_field( get_post_meta( get_the_ID(),'readmore_button', true )),
								'link'       => sanitize_text_field( get_post_meta( get_the_ID(),'readmore_link', true )),
								'image_url'  => get_the_post_thumbnail_url(),
								'open_new_tab' => isset($data['readmore_target'])? $data['readmore_target'] : false,
								'id'         => 'customizer_repeater_56d7ea7f40b50',
							);
							endwhile; 
							$slide_options = json_encode($pro_slider_data_old);
						}
				}elseif(!empty($lite_slider_data))
			{
				$slide_options = json_encode( array(
					array(
					'title'      => isset($lite_slider_data['caption_head'])? $lite_slider_data['caption_head']:'Responsive WP theme',
					'text'       => isset($lite_slider_data['caption_text'])? $lite_slider_data['caption_text'] :'We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations.',
					'button_text'      => isset($lite_slider_data['readmore_text'])? $lite_slider_data['readmore_text'] : 'Read more',
					'link'       => isset($lite_slider_data['readmore_text_link'])? $lite_slider_data['readmore_text_link'] : '#',
					'image_url'  => isset($lite_slider_data['slider_image'])? $lite_slider_data['slider_image'] :  get_template_directory_uri().'/images/slide1.jpg',
					'open_new_tab' => isset($lite_slider_data['readmore_target'])? $lite_slider_data['readmore_target'] : false,
					'id'         => 'customizer_repeater_56d7ea7f40b50',
					),
				) );
			}
}

$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/indexslider-script.php' );
?>
<div class="clearfix"></div>

<!-- Slider -->
<?php if( $current_options['home_page_slider_enabled'] == 'on' ) { ?>
<div id="main" role="main">
	<section class="slider">
		<div id="slider" class="flexslider">
			<ul class="slides">
			<?php 
				$slide_options = json_decode($slide_options);
				
				if( $slide_options!='' )
				{
					foreach($slide_options as $slide_iteam){?>
				<li>
					<?php if($slide_iteam->image_url!=''){ ?>
					<img alt="img" class="img-responsive" src="<?php echo $slide_iteam->image_url; ?>" draggable="false">
					
					<?php
					}
					
					$title = ! empty( $slide_iteam->title ) ? apply_filters( 'busiprof_translate_single_string', $slide_iteam->title, 'Slider section' ) : ''; 
					$img_description = ! empty( $slide_iteam->text ) ? apply_filters( 'busiprof_translate_single_string', $slide_iteam->text, 'Slider section' ) : '';
					$readmorelink = ! empty( $slide_iteam->link ) ? apply_filters( 'busiprof_translate_single_string', $slide_iteam->link, 'Slider section' ) : '';
					$readmore_button = ! empty( $slide_iteam->button_text ) ? apply_filters( 'busiprof_translate_single_string', $slide_iteam->button_text, 'Slider section' ) : '';
					$open_new_tab = $slide_iteam->open_new_tab;
					?>
					<div class="container">
					<?php if($title!= '' || $img_description!= '' || $readmore_button!=''){ ?>
						<div class="slide-caption">
						<?php if($title!= '') { ?>	
							<h2><?php echo $title; ?></h2>
						<?php } 
							if($img_description!= '') {?>
							<p><?php echo $img_description ;?></p>
							<?php }?>
							<div>
							<?php if($readmore_button!='' ) { ?>
							<a href="<?php echo $readmorelink ;?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?> class="flex-btn">
							<?php echo $readmore_button ?>
							</a>
							<?php } ?>
							</div>	
						</div>	
					<?php } ?>						
					</div>
				</li>
					<?php 	}  
				}   else { ?>
				<li>
					<img alt="img" src="<?php echo get_template_directory_uri(); ?>/images/slide1.jpg" />
					<div class="container">
						<div class="slide-caption">
							<h2><?php _e('Responsive WP theme','busiprof'); ?></h2>
							<p><?php _e('We are a group of passionate designers and developers who love to create awesome WordPress themes with an amazing support and the coolest video documentation.','busiprof'); ?></p>
							<div><a href="#" class="flex-btn"><?php _e('Read More','busiprof'); ?></a></div>	
						</div>		
					</div>
				</li>
				<li>
					<img alt="img" src="<?php echo get_template_directory_uri(); ?>/images/slide2.jpg" />
					<div class="container">
						<div class="slide-caption">
							<h2><?php _e('Graphic design','busiprof'); ?></h2>
							<p><?php _e('We are a group of passionate designers and developers who love to create awesome WordPress themes with an amazing support and the coolest video documentation.','busiprof'); ?></p>
							<div><a href="#" class="flex-btn"><?php _e('Read More','busiprof'); ?></a></div>	
						</div>		
					</div>
				</li>
				<li>
					<img alt="img" src="<?php echo get_template_directory_uri(); ?>/images/slide3.jpg" />
					<div class="container">
						<div class="slide-caption">
							<h2><?php _e('User friendly','busiprof'); ?></h2>
							<p><?php _e('We are a group of passionate designers and developers who love to create awesome WordPress themes with an amazing support and the coolest video documentation.','busiprof'); ?></p>
							<div><a href="#" class="flex-btn"><?php _e('Read More','busiprof'); ?></a></div>	
						</div>		
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>			
	</section>
</div>
<!-- End of Slider -->

<div class="clearfix"></div>
<?php
if( $current_options['home_banner_strip_enabled'] == 'on' && $current_options['intro_tag_line'] != '' ) { ?>

<section class="header-title"><h2><?php echo $current_options['intro_tag_line']; ?> </h2></section>
<div class="clearfix"></div>
<?php }
 } ?>