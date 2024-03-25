<?php
/**
 * Template Name: Coney News
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

<div class="container">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 left-content-section">
<?php
$args = array( 'posts_per_page' => 5, 'offset'=> 1 );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<div class="news-box">
<?php if(get_the_post_thumbnail($post->ID) !=""){
 echo get_the_post_thumbnail($Post_ID, array(704,250) ); }
 else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg">
<?php } ?>
<h1><?php the_title(); ?></h1>
<ul class="post-box">
<li><?php global $current_user; $current_user = wp_get_current_user(); echo $current_user->user_login; ?></li>
<li><?php echo get_the_time('M j ', $Post_ID); ?></li>
<li><?php comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></li>
<li><?php echo $cat = get_cat_name( $_GET['cat'] ) ; ?></li>
</ul>

<p><?php echo substr(strip_tags($post->post_content), 0, 300);?></p>
<a class="btn btn-transparent team-member__btn" href="<?php the_permalink(); ?>">Read More</a>

</div>	
<?php endforeach; 
wp_reset_postdata();?>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 content-right">
<?php dynamic_sidebar('coney-news' ); ?>
<?php dynamic_sidebar('picture-week' ); ?>

</div>
</div>
</div>	<!-- #contianer -->



<?php
//get_sidebar();
get_footer();
