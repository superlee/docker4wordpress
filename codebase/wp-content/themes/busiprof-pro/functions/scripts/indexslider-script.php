<?php $current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );?>
<script type="text/javascript">
	// Flexslider custom js here
	jQuery(document).ready(function(){
	  //Hompage Slider Js
      jQuery('#slider').flexslider({
        animation: "<?php echo $current_options['animation']; ?>",
		slideshowSpeed: "<?php echo $current_options['slideshow_speed']; ?>",
		direction: "<?php echo $current_options['slide_direction']; ?>",
        animationSpeed: "<?php echo $current_options['animation_speed']; ?>",
        controlNav: false,
        animationLoop: true,
        pauseOnHover: true,
        slideshow: true,
        sync: "#carousel",
        after: function (slider) {            
            if (!slider.playing) {
                slider.play();
            }
        }
		
      });
    });	
</script>


