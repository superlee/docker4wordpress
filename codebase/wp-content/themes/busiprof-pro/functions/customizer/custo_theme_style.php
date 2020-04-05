<?php 
// Adding customizer home page setting
function busiprof_style_customizer( $wp_customize ){
//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>Predefined Colors</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } ?>
		
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-busiprof_pro_theme_options-theme_color label img").click(function(){
					$("#customize-control-busiprof_pro_theme_options-theme_color label img").removeClass("selected_img");
					$(this).addClass("selected_img");
				});
			});
		  </script>
		  <?php 
       }

}

class WP_back_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined default background','busiprof').'</h3>';
		  $name = '_customize-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				
				<img <?php if($this->value() == $key){ echo 'class="background_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-pattern/<?php echo esc_attr( $key ); ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
            <?php
		  }
		  ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-busiprof_pro_theme_options-back_image label img").click(function(){
					$("#customize-control-busiprof_pro_theme_options-back_image label img").removeClass("background_active");
					$(this).addClass("background_active");
				});
			});
		  </script>
		  <?php
       }

}



	/* Theme Style settings */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => __('Theme style settings', 'busiprof'),
		'priority'   => 0,
   	) );
	
		
	$wp_customize->add_setting(
    'busiprof_pro_theme_options[layout_selector]',
    array(
        'default' => __('wide','busiprof'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'busiprof_pro_theme_options[layout_selector]',
    array(
        'type' => 'select',
        'label' => __('Theme Layout','busiprof'),
        'section' => 'theme_style',
		'choices' => array('wide'=>'wide', 'boxed'=>'boxed'),
	));	


	$wp_customize->add_setting(
	'busiprof_pro_theme_options[back_image]', array(
	'default' => 'bg-img1.png',  
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
    ));
	$wp_customize->add_control(new WP_back_Customize_Control($wp_customize,'busiprof_pro_theme_options[back_image]',
	array(
        'label'   => __('Predefined default backgrounds', 'busiprof'),
        'section' => 'theme_style',
		'priority'   => 160,
		'type' => 'radio',
		'choices' => array(
			'bg-img1.png' => 'Pattern 0',
            'bg-img2.png' => 'Pattern 1',
            'bg-img3.png' => 'Pattern 2',
            'bg-img4.png' => 'Pattern 3',
			'bg-img5.png' => 'Pattern 4',
			'bg-img6.jpg' => 'Pattern 5',
			'bg-img7.jpg' => 'Pattern 6',
			'bg-img8.jpg' => 'Pattern 7',
			'bg-img9.jpg' => 'Pattern 8',
			'bg-img10.jpg' => 'Pattern 9',
			'bg-img11.png' => 'Pattern 10',
    )
	
	)));
	
	
	
	//Theme Color Scheme
	$wp_customize->add_setting(
	'busiprof_pro_theme_options[theme_color]', array(
	'default' => 'default.css',  
	'capability'     => 'edit_theme_options',
	'type' => 'option',
    ));
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'busiprof_pro_theme_options[theme_color]',
	array(
        'label'   => __('Predefined colors', 'busiprof'),
        'section' => 'theme_style',
		'type' => 'radio',
		'settings' => 'busiprof_pro_theme_options[theme_color]',	
		'choices' => array(
			'default.css' => 'default.jpg',
			'red.css' => 'red.jpg',
			'green.css' => 'green.jpg',
			'orange.css' => 'orange.jpg',
			'sea-green.css' => 'lightsea.jpg',
            'mandy.css' => 'mandy.jpg',
			'blue-dark.css' => 'blue.jpg',
			'aqua.css' => 'aqua.jpg',
			'wedgewood.css' => 'wadge.jpg',
			'regal-blue.css' =>'regal.jpg',
			'yellow.css' => 'yellow.jpg',
			'cyan.css' => 'cyan.jpg',
			'mariner.css' => 'mariner.jpg',
    )
	
	)));
	
	
	$wp_customize->add_setting(
    'busiprof_pro_theme_options[link_color_enable]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'busiprof_pro_theme_options[link_color_enable]',
    array(
        'label' => __('Enable custom color skin','busiprof'),
        'section' => 'theme_style',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
	'busiprof_pro_theme_options[link_color]', array(
	'capability'     => 'edit_theme_options',
	'default' => '#01488e',
	'type' => 'option',
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'busiprof_pro_theme_options[link_color]', 
	array(
		'label'      => __( 'Skin color', 'busiprof' ),
		'section'    => 'theme_style',
		'settings'   => 'busiprof_pro_theme_options[link_color]',
	) ) );
	
	
}
add_action( 'customize_register', 'busiprof_style_customizer' );