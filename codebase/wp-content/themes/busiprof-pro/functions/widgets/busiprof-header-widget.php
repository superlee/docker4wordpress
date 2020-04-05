<?php
	// Register and load the widget
	function busiprof_info_header_widget() {
	    register_widget( 'busiprof_header_info_widget' );
	}
	add_action( 'widgets_init', 'busiprof_info_header_widget' );

// Creating the widget
	class busiprof_header_info_widget extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'busiprof_info_header_widget', // Base ID
			__('WBR: Header Widget','busiprof'), // Widget Name
			array(
				'classname' => 'busiprof_header_info_widget',
				'description' => 'Header Info widget.',
			),
			array(
				'width' => 600,
			)
		);
		
	 }
	
	public function widget( $args, $instance ) {
	
	echo $args['before_widget']; 
	
	if($args['id']=='sidebar_primary')
	{
		$instance['before_title']='<div class="sm-widget-title wow fadeInDown animated" data-wow-delay="0.4s"><h3>';
		$instance['before_title']='</h3></div><div class="sm-sidebar-widget wow fadeInDown animated" data-wow-delay="0.4s">';
		
		echo $args['before_title'] .'<i class="fa '.$instance['fa_icon'].'"></i>'. $args['after_title'];
	}
	?>
			<ul class="header-contact-info">
			<li>
				<?php if(!empty($instance['fa_icon'])) { ?>
				<i class="fa <?php echo $instance['fa_icon']; ?>"></i>
				<?php } ?>
				<?php if(!empty($instance['link'])) { ?>
				<a href="<?php echo $instance['link']; ?>" <?php echo ($instance['target']?'target="_blank"':''); ?> >
				<?php if(!empty($instance['description'])) { ?>
				<?php echo $instance['description']; ?>
				 </a>
				<?php } }
				else
				{
				if(isset($instance['description']))
				{
				echo $instance['description'];
				}}				
				?>
			</li>
			</ul>
	<?php
	echo $args['after_widget'];
	}
	         
	// Widget Backend
	public function form( $instance ) {
		
	if ( isset( $instance[ 'fa_icon' ])){
		$fa_icon = $instance[ 'fa_icon' ];
	}
	else {
	$fa_icon = 'fa fa-envelope';
	}
	
	if ( isset( $instance[ 'description' ])){
	$description = $instance[ 'description' ];
	}
	else {
	$description = __( 'Email us: themes@busiprof.com', 'busiprof' );
	}
	
	if ( isset( $instance[ 'link' ])){
	$link = $instance[ 'link' ];
	}
	else {
	$link = '';
	}
	
	if ( isset( $instance[ 'target' ])){
	$target = $instance[ 'target' ];
	}
	else {
	$target = false;
	}

	// Widget admin form
	?>
	
	<h4 for="<?php echo $this->get_field_id( 'fa_icon' ); ?>"><?php __( 'Font Awesome icon','busiprof' ); ?></h4>
	<input class="widefat" id="<?php echo $this->get_field_id( 'fa_icon' ); ?>" name="<?php echo $this->get_field_name( 'fa_icon' ); ?>" type="text" value="<?php if($fa_icon) echo esc_attr( $fa_icon ); else echo 'fa fa-envelope';?>" />
	<span><?php _e('Find all icons','busiprof'); echo " ";?><a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank" ><?php _e('here','busiprof'); ?></a></span>
	
	<h4 for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description','busiprof' ); ?></h4>
	<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php if($description) echo htmlspecialchars_decode($description); else _e( 'Email us: themes@busiprof.com', 'busiprof' );?>" /><br><br>
	
	<h4 for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link','busiprof' ); ?></h4>
	<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php if($link) echo htmlspecialchars_decode($link); else echo '';?>" /><br><br>
	
	<h4 for="<?php echo $this->get_field_id( 'target' ); ?>"><?php _e( 'Open link in new tab','busiprof' ); ?></h4>
	<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>" <?php if($target!=false) echo 'checked'; ?> /><br><br>
	
	
	<?php
    }  
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
		$instance = array();
		$instance['fa_icon'] = ( ! empty( $new_instance['fa_icon'] ) ) ? strip_tags( $new_instance['fa_icon'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? htmlspecialchars_decode($new_instance['description']) : '';
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? $new_instance['link'] : '';
		$instance['target'] = ( ! empty( $new_instance['target'] ) ) ? $new_instance['target'] : '';
		
		return $instance;
	}
	}