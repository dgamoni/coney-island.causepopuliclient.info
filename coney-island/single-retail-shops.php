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
							<h4><?php echo get_field('address'); ?></h4>
							<h4><?php echo get_field('phone_number'); ?></h4>
								<h4><?php echo get_field('hours_operation'); ?></h4>
							<h4><?php echo get_field('month_operation'); ?></h4>
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
