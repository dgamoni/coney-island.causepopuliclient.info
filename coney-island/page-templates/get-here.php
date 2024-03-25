<?php

/**

* Template Name: Get Here Page

*

* @package WordPress

* @subpackage Twenty_Fourteen

* @since Twenty Fourteen 1.0

*/

get_header();

?>



<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
<!-- content starts -->   
<content>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
<!--<div style='overflow:hidden;height:350px; width: 100%; margin-bottom: 40px; float:left;'><div id='gmap_canvas' style='height:350px;width: 100%;'></div></div>-->
</div>
<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
	<?php endwhile; ?>

</div>
</div>
    </div>	<!-- #contianer -->

</content>
<!-- content ends -->

<?php get_footer(); ?>
