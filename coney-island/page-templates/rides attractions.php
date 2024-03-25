<?php
/**
 * Template Name: Rides-Attractions
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
<div style='overflow:hidden;height:350px; width: 100%; margin-bottom: 40px; float:left;'><div id='gmap_canvas' style='height:350px;width: 100%;visibility: visible!important;'></div></div>
</div>-->
<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
<?php 
$wp_cat =  $wp_query->query('post_type=rides-attractions&showposts=50&order=DESC&paged='.$paged.'');
while ( have_posts() ) : the_post(); ?>
<div class="col-sm-4 food-box">
				  <div class="folio-item wow">
					<div class="folio-image">
				<a href="<?php the_permalink(); ?>"><?php if(get_the_post_thumbnail($post->ID) !=""){
 echo get_the_post_thumbnail($Post_ID, array(410,273) ); }
 else { ?></a>
<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg">
<?php } ?>
					 <h3><?php the_title(); ?></h3>
					</div>
					<div class="overlay">
					  <div class="overlay-content">
						<div class="overlay-text">
						  <div class="folio-info">
							<h4><?php echo get_field('address'); ?></h4>
							<h4><?php echo get_field('phone_number'); ?></h4>
							
							<h4><?php echo get_field('hours_operation'); ?></h4>
							<h4><?php echo get_field('month_operation'); ?></h4>
						  </div>
							 <div class="folio-overview">
								<span class="folio-expand"><a href="<?php the_permalink(); ?>"><i class="fa fa-plus"></i></a></span>
							  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
<?php endwhile;  ?>
<?php echo do_shortcode('[ajax_load_more post_type="post,  max_pages="50" rides-attractions"]'); ?>
</div>

</div>
</div>	<!-- #contianer -->
 </section>
		<!-- End portfolio image -->


<?php
//get_sidebar();
get_footer();
