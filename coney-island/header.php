<?php
/**
 * The Header for our Coney Island
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Coney Island
 * @subpackage Coney Island
 * @since Coney Island
 */
 ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta content="True" name="HandheldFriendly">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="viewport" content="width=device-width">
       
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png"> 
		<!-- CSS -->
		 <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
		 <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slicknav.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css">
		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
		<!---normalize Css-->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
		<!---carousel Css-->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.theme.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.transitions.css">
		<!-- Custom styles CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fonts.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/elastislide.css">
		<link href="<?php bloginfo('template_url'); ?>/css/flatWeatherPlugin.css" rel="stylesheet">
	<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.17475.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
	 <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
<script type='text/javascript' src='http://embedmaps.com/google-maps-authorization/script.js?id=6a80651cd5da6dad4f4473ee4fb2e1c1ee45be4b'></script><script type='text/javascript'> function init_map(){
var myOptions = {
zoom:12,center:new google.maps.LatLng(40.5749261,-73.9859414),
mapTypeId: google.maps.MapTypeId.ROADMAP};
map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.5749261,-73.9859414)});
infowindow = new google.maps.InfoWindow({
content:'<strong>Surf Ave & Stillwell Ave</strong><br>'+
' Brooklyn, NY 11224<br>'+
' <br>'
});
google.maps.event.addListener(marker, 'click', function(){
infowindow.open(map,marker);
});
infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', init_map);
</script>
<script class="ai1ec-widget-placeholder" data-widget="ai1ec_agenda_widget" data-events_seek_type="events">
  (function(){var d=document,s=d.createElement('script'),
  i='ai1ec-script';if(d.getElementById(i))return;s.async=1;
  s.id=i;s.src='//coney-island.causepopuliclient.info/?ai1ec_js_widget';
  d.getElementsByTagName('head')[0].appendChild(s);})();
</script>
		 
		 <a href='http://www.maps-generator.com'><h2 style="display:none;">here</h2></a>  

	
		<?php wp_head(); ?>
    </head>
    <body>

		<header  class="header_area">
		<!--<div id="sticker">-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="logo slideInUp">
					   <a href="<?php bloginfo('url'); ?>">
<?php if(get_option('fl_logo_url') !=""){ ?>
<img src="<?php echo get_option('fl_logo_url'); ?>" alt="">
<?php } else { ?>
<?php bloginfo('name'); } ?>
</a>
	  
						</div><!--End of logo-->
					</div>
					
					<div class="col-md-8 col-xs-12">
						<div class="icon slideInRight">
							<div class="search_box">
							<?php get_search_form(); ?>
								<!--<form action="#">
									<input type="text" placeholder="Search for something...." />
									<i class="fa fa-search"></i>
								</form>-->
							</div><!--End of Search Box-->
								  <?php if(get_option('fl_facebook_link') !="") { ?>
							<a href="<?php echo get_option('fl_facebook_link'); ?>"><i class="fa fa-facebook"></i></a>
								  <?php } ?>
								    <?php if(get_option('fl_twitter_link') !="") { ?>
							<a href="<?php echo get_option('fl_twitter_link'); ?>"><i class="fa fa-twitter"></i></a>
							<?php } ?>
							    <?php if(get_option('fl_instagram') !="") { ?>
							<a href="<?php echo get_option('fl_instagram'); ?>"><i class="fa fa-instagram"></i></a>
							<?php } ?>
						<a href="javascript:void(0);"><!--<img src="<?php bloginfo('template_url'); ?>/img/weather.png" alt="" />--><div id="weatherReport"></div><?php //dynamic_sidebar('Weather' ); ?></a>
							
				
						</div>
					<!--<div id="example"></div>-->
						<div class="mainmenu slideInLeft">
							<ul id="nav">
							<?php wp_nav_menu( array('menu' => 'header_menu','menu_class' => 'nav navbar-nav navbar-right navigation' )); ?>
								<!--<a href="#">ABOUT</a></li>
								<li><a href="#">VISIT</a></li>
								<li><a href="#">EXPLORE</a></li>
								<li><a href="#">PLAN</a></li>
								<li><a href="#">GET HERE</a></li>-->
								</ul>
						</div><!--End of mainmenu-->
					</div>
				</div>
			</div>
		<!--</div>-->
		</header><!--End of header-->

						  				

	
		