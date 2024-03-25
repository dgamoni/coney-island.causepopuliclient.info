<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
</div>

<div class="content-main  single-main">
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 left-content-section" style="padding-right: 25px;">
			
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
	<?php endwhile; ?>

</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 content-right">
<div id="secondary">

<?php if ( is_active_sidebar( 'about-us' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'about-us' ); ?>
	</div><!-- #About-sidebar -->
	<?php endif;  ?>
</div><!-- #secondary -->
</div>
</div>
    </div>	<!-- #contianer -->
	</div> <!-- #content --> 
	
	</content>
<!-- content ends -->

<?php get_footer(); ?>
