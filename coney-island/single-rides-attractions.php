<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left-content-section">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>


<div class="news-box">
<?php if(get_the_post_thumbnail($post->ID) !=""){
 echo get_the_post_thumbnail($Post_ID, array(704,250) ); }
 else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg">
<?php } ?>
<!--<h1><?php //the_title(); ?></h1>
<ul class="post-box">
<li><?php //global $current_user; $current_user = wp_get_current_user(); echo $current_user->user_login; ?></li>
<li><?php //echo get_the_time('M j ', $Post_ID); ?></li>
<li><?php //comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></li>
<li><?php //global $post; $category = get_the_category($post->ID); echo $category[0]->name; ?></li>
</ul>-->


</div>	

</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 content-right">
						  <div class="folio-info">
							  <?php 
									$address = get_field('address');
									$phone_number = get_field('phone_number');
									$hours_operation = get_field('hours_operation');
									$month_operation = get_field('month_operation');
									$website_url = get_field('website_url');
								if($address) {
									echo '<h4>'.$address.'</h4>';
								}
								if($phone_number) {
									echo '<h4>'.$phone_number.'</h4>';
								}
								if($hours_operation) {
									echo '<h4>'.$hours_operation.'</h4>';
								}
								if($month_operation) {
									echo '<h4>'.$month_operation.'</h4>';
								}							
								if($website_url) {
									echo '<a class="website_url" href="'.$website_url.'" target="_blank">'.$website_url.'</a>';
								}
								?>
						  </div>
<p><?php the_content(); ?><?php //echo substr(strip_tags($post->post_content), 0, 300);?></p>

</div>
<?php endwhile; ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="navigation">

<div class="alignleft">
<?php previous_post_link(); ?>
</div>

<div class="alignright">
<?php next_post_link(); ?>
</div>

</div><!-- .navigation -->
</div>
</div>	<!-- #contianer -->



<?php
//get_sidebar();
get_footer();
