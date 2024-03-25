<?php

/**

* Template Name: Home Page

*

* @package WordPress

* @subpackage Twenty_Fourteen

* @since Twenty Fourteen 1.0

*/


get_header();

?><style>
.initerary_builder {
    background: rgba(0, 0, 0, 0) url("<?php echo $value1 = get_field( "itinerary_builder"); ?>") cover;
    color: #fff;
    height: 400px;
    text-align: center;
}
.explore_area{
background: url("<?php echo $value1 = get_field( "explore_bg"); ?>") no-repeat scroll center center / cover  rgba(0, 0, 0, 0);
min-height: 520px;
color:#fff;
}
.promotion_area{
background: url("<?php echo $value1 = get_field( "get_here_bg"); ?>") no-repeat scroll center center / cover  rgba(0, 0, 0, 0);
min-height: 600px;
text-align: center;
}
</style>


<section class="slider_area" id="about">

<!-- Slider Start -->
<div class="another_slider_area">
<div class="text-center">
<div id="carousel-example-generic" class="carousel slide">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<?php
$auto = 1;
$slider_record = get_field('slider');
//echo "<pre>";print_r($slider_record);echo "</pre>";
foreach ($slider_record as $slider_val){

?>

<div class="<?php if($auto==1) { echo "active"; } ?> item" id="active">
	
<img style="position: absolute;width: 100%;" src="<?php echo $slider_val['image']; ?>">						
<div class="col-md-12 top-right-section bttn">
<h2 class="title"><!---you can change it from here--->
<?php echo $slider_val['title']; ?>
</h2>
<h3 class="title_two">
<?php echo $slider_val['sub_title']; ?>
</h3>
<div class="text-center">
<a href="<?php echo $slider_val['link']; ?>" class="btn btn-transparent team-member__btn">Discover More</a>

</div>							
</div>
</div>

<?php
$auto++;
}?>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
<span class="icon-prev"><img src="<?php bloginfo('template_url'); ?>/img/left.png" alt="" /></span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
<span class="icon-next"><img src="<?php bloginfo('template_url'); ?>/img/right.png" alt="" /></span>
</a>
</div>
</div>
</div><!-- /.End Slider -->
</section>									

<!---End slider area--->	


<section class="visit_area" id="visit">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="visit_img">
<img src="<?php echo $value = get_field( "visit_image"); ?>"/>							
</div>	
<!--<div class="visit_img_2">
<img src="<?php bloginfo('template_url'); ?>/img/visit_bottom.png" alt="visit_bottom"/>							
</div>-->					
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="visit_content bounceInRight">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
	<?php endwhile; ?>
</div>
</div>
</div>
</div>
</section><!---End visit area--->	

<section class="explore_area" id="explore">
<div class="container">
<div class="row">

<div class="col-md-12">
<div class="explore">
<h1>Explore</h1>
</div>
<br/>
</div>
<?php
$auto = 1;
$explore_record = get_field('explore');
//echo "<pre>";print_r($slider_record);echo "</pre>";
foreach ($explore_record as $explore_val){

?>
<div class="col-md-4 col-xs-12">
<div class="explore_one">
<a href="<?php echo $explore_val['link']; ?>"><img src="<?php echo $explore_val['logo']; ?>"></a>
<h2><a href="<?php echo $explore_val['link']; ?>"><?php echo $explore_val['title']; ?></a></h2>
</div>
</div>
<?php
$auto++;
}?>
</div>
</div>
</div>
</section><!---End explore_area--->	


<section class="explore_area_two">
<div class="container">
<div class="row">
<div class="col-md-6">
<h2 class="explore_title">UPCOMING EVENTS IN CONEY ISLAND</h2>
<?php dynamic_sidebar('events' ); ?>
<a href="<?php bloginfo('url'); ?>/coney-island-events/"><button class="button">VIEW FULL CALENDAR</button></a>
</div>

<div class="col-md-6">
<h2 class="explore_title">ITINERARY BUILDER</h2>
<div class="initerary_builder bounceInDown">
<p>Pre-planned itineraries <br>  
and interactive maps to  <br> help you plan your visit</p>
<h5>BUILD YOUR <br>  ITINERARY NOW!</h5>
<a href="/planned-itineraries/"><button class="button">PLAN YOUR VISIT</button></a>
</div>
</div>
</div>
</div>
</section><!---End explore_area_two--->	


<section class="promotion_area" id="plan">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="promotion_title">
<h1>Get Here</h1>
</div>	
</div>
</div>
<div class="row">
<?php
$auto = 1;
$get_here_record = get_field('get_here');
//echo "<pre>";print_r($slider_record);echo "</pre>";
foreach ($get_here_record as $get_here_val){

?>
<div class="col-md-4">
<div class="single_promotion">
<a href="<?php echo $get_here_val['link']; ?>"><img src="<?php echo $get_here_val['logo']; ?>" alt="park" /></a>
<a href="<?php echo $get_here_val['link']; ?>"><h2><?php echo $get_here_val['title']; ?></h2></a>
<div class="bottom-line-3"></div>
</div>
</div>
<?php
$auto++;
}?>
</div>
</div>
</section><!---End promotion_area--->			

<section class="announcement_area" id="get-here">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="announcement_title">
<h1>CONEY ISLAND ANNOUNCEMENTS</h1>
</div>	
<?php // retrieve one post with an ID of 1
query_posts('posts_per_page=3'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="col-md-4">
<div class="single_announcement bounceInLeft">
<?php if(get_the_post_thumbnail($post->ID) !=""){
 echo get_the_post_thumbnail($Post_ID, array(410,185) ); }
 else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg">
<?php } ?>
<p><?php get_the_author(); ?><?php echo get_the_date(); ?></p>
<h3><?php the_title(); ?></h3>
<div class="bottom-line-2"></div>
<h5><?php echo substr(strip_tags($post->post_content), 0, 125);?>...</h5>
<a href="<?php the_permalink(); ?>"><button class="button">Learn More</button></a>
</div>
</div>
<?php
 endwhile; 

 ?>
</div>
</div>
</div>
</section><!---End ANNOUNCEMENTS area--->


<?php
//get_sidebar();
get_footer();

