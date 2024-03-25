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
<!-- content starts -->
<content>
<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-content-section">
			
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
	<?php endwhile; ?>

</div>
</div>
    </div>	<!-- #contianer -->

</content>
<!-- content ends -->

<?php get_footer(); ?>
