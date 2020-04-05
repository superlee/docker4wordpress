<?php
// Webriti scripts
if( !function_exists('busiporf_scripts'))
{
	function busiporf_scripts(){
		
		$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
		// css
		wp_enqueue_style('style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
		wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css' );
		//wp_enqueue_style('default-css', get_template_directory_uri() . '/css/default.css' );
		wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/css/flexslider.css' );
		if($current_options['link_color_enable'] == true) {
		custom_light();
		}
		else
		{
		$class=$current_options['theme_color'];
		wp_enqueue_style('default-css', get_template_directory_uri() . '/css/'.$class);
		}
		
		
		wp_enqueue_style('busiporf-Droid', '//fonts.googleapis.com/css?family=Droid+Sans:400,700' );
		wp_enqueue_style('busiporf-Montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700' );
		wp_enqueue_style('busiporf-Droid-serif', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' );
		
		wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/css/lightbox.css' );
		
		// js
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'busiporf-bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js' );
		wp_enqueue_script( 'busiporf-flexslider-js' , get_template_directory_uri() . '/js/jquery.flexslider.js' );
		wp_enqueue_script( 'busiporf-custom-js' , get_template_directory_uri() . '/js/custom.js' );
		
		wp_enqueue_script( 'busiporf-lightbox-js' , get_template_directory_uri() . '/js/lightbox/lightbox-2.6.min.js' );
		
		wp_enqueue_script('busiporf-mp-masonry-js', get_template_directory_uri() . '/js/masonry/mp.mansory.js');
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}
add_action('wp_enqueue_scripts','busiporf_scripts');

add_action('wp_head','busiprof_enqueue_custom_css');
function busiprof_enqueue_custom_css()
{
	$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
	
	if($current_options['busiprof_pro_custom_css']!='') {  ?>
	<style>
	<?php echo $current_options['busiprof_pro_custom_css']; ?>
	</style>
	<?php } 
}

add_action( 'admin_enqueue_scripts', 'busiprof_enqueue_script_function' );
function busiprof_enqueue_script_function()
{
wp_enqueue_style('busiprof-customize', get_template_directory_uri() . '/css/customize.css' );
}


// footer custom script
function footer_custom_script()
{
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
if($current_options['link_color_enable'] == true) {
custom_light();
}

wp_reset_query();
$col =6;

if(is_page_template('template-masonry-2-col.php'))
{
	
	$col =6;
}
elseif(is_page_template('template-masonry-3-col.php'))
{
	
	$col =4;
}
elseif(is_page_template('template-masonry-4-col.php'))
{
	
	$col =3;
}
?>
<script>
jQuery(document).ready(function ( jQuery ) {
	jQuery("#blog-masonry").mpmansory(
		{
			childrenClass: 'item', // default is a div
			columnClasses: 'padding', //add classes to items
			breakpoints:{
				lg: <?php echo $col; ?>, //Change masonry column here like 2, 3, 4 column
				md: 6, 
				sm: 6,
				xs: 12
			},
			distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
			onload: function (items) {
				//make somthing with items
			} 
		}
	);
});
</script>
<?php
}
add_action('wp_footer','footer_custom_script');

?>