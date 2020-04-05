<?php /**
 * Template Name: Blog masonry 3 Col
 */
get_header();
get_template_part('index', 'bannerstrip');
?>
<!-- Blog Masonry 3 Column Section -->
<?php get_template_part('content','masonry'); ?>
<!-- End of Blog Masonry 3 Column Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>