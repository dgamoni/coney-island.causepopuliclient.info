<?php
/**
 * Template Name: Calendar-Events
 * The Template for displaying all single posts
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

<!-- Start portfolio area -->
<section id="portfolio">
<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
<div style='overflow:hidden;height:350px; width: 100%; margin-bottom: 40px; float:left;'><div id='gmap_canvas' style='height:350px;width: 100%;'></div></div>
</div>-->
<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="row">
<div class="col-xs-12 col-lg-12 col-md-12 col-sm">


<?php
$wp_cat =  $wp_query->query('post_type=ai1ec_event&showposts=6&order=DESC&paged='.$paged.'');
while ( have_posts() ) : the_post(); ?>
<div class="col-sm-4 col-sm event-box">
<a href="<?php the_permalink(); ?>">
<?php if(get_the_post_thumbnail($post->ID) !=""){
 echo get_the_post_thumbnail($Post_ID, array(346,230) ); }
 else { ?></a>
<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg">
<?php } ?>

<span><?php echo get_the_time('j M', $Post_ID); ?></span>
<h2><?php the_title(); ?></h2>
<p class="red-line"><?php echo substr(strip_tags($post->post_content), 0, 200);?></p>
</div>
<?php endwhile;  ?>

</div>
</div>
</div>	<!-- #contianer -->
 </section>
		<!-- End portfolio image -->


<?php
//get_sidebar();
get_footer();
