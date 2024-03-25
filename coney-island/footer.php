<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="carousel_area">
<h2 class="explore_title">OUR PARTNERS</h2>
<ul id="carousel" class="elastislide-list">
<?php
$partner_record = get_field('our_partner','4');
//echo "<pre>";print_r($partner_record);echo "</pre>";
foreach ($partner_record as $our_part_val){
	
//die("hi");
?>
<li><a href="<?php echo $our_part_val['link']; ?>"><img src="<?php echo $our_part_val['logo']; ?>" alt="partner" /></a></li>
<?php 

}  ?>
</ul>
</div>
</div>
</div>
</div>
	
		<footer class="footer_top_area">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
					<h1>VISITING CONEY ISLAND</h1><div class="bottom-line"></div>
						<div class="single_widget bounceInLeft">
								<?php wp_nav_menu( array('menu' => 'footer_menu','menu_class' => 'nav navbar-nav navbar-right navigation' )); ?>
								<!--<ul>
							<li><a href="#">About</a></li>
								<li><a href="#">Checklist</a></li>
								<li><a href="#">Disabilities</a></li>
								<li><a href="#">Fun Map of Coney Island</a></li>
								<li><a href="#">History</a></li>
								<li><a href="#">Merchandise</a></li>
								<li><a href="#">Tips & Tricks</a></li>
								<li><a href="#">Welcome Center</a></li>
							</ul>-->
						</div>
					</div>
					<div class="col-md-4">
						<h1>SOCIAL MEDIA</h1><div class="bottom-line"></div>
						<div class="single_widget">
						<?php dynamic_sidebar('social-media' ); ?>
							<?php //echo do_shortcode('[dc_social_tabs]'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<h1>NEWSLETTER SIGN UP</h1><div class="bottom-line"></div>
						<div class="single_widget bounceInRight">
					
							<p>Sign up today to start receiving our special Coney Island Fun Guide newsletter! Our newsletters are filled with upcoming events, travel tips, tourist attractions and more.</p>
						<?php echo do_shortcode('[nsu_form]'); ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
			
		  <footer class="footer_bottom_area">
            <div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="footer_left">
							<p>&copy;<?php echo get_option('fl_footer_copy'); ?> </p>
						</div>
						
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="footer_right">
							<p>Website Designed <br> & Developed by</p>
							<img src="<?php bloginfo('template_url'); ?>/img/footer_logo.png" alt="footer_logo" />
						</div>
						
					</div>
				</div>
            </div>
        </footer>

		<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
		<script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.1.min.js"></script>
        <!-- include flatWeatherPlugin -->
        <?php /*?><script src="<?php bloginfo('template_url'); ?>/js/jquery.flatWeatherPlugin.js"></script><?php */?>
		<!---carousel js-->
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.elastislide.js"></script>
		<script type="text/javascript">
			
			$( '#carousel' ).elastislide();
			
		</script>
		<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
		
		<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
		
		<script src="<?php bloginfo('template_url'); ?>/js/jquerypp.custom.js"></script>
		
		<script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
		

		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var s = $("#sticker");
			var pos = s.position();					   
			$(window).scroll(function() {
				var windowpos = $(window).scrollTop();
				if (windowpos >= pos.top) {
					s.addClass("stick");
				} else {
					s.removeClass("stick");	
				}
			});
		});
		</script>
		<!-- Latest compiled and minified JavaScript -->
        <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
		<!-- plugins  -->
		<script src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>


		<!-- include flatWeatherPlugin -->
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.flatWeatherPlugin.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			//for custom output call with render: false
			var custom_example = $("#weatherReport").flatWeatherPlugin({
				location: "Coney Island New York",
				country: "USA",
				api: "yahoo",
				render : false //the plugin will not generate any markup
			});
			
			//then manually call 'fetchWeather' which returns a jquery promise
			//when complete, result contains the weather data
			custom_example.flatWeatherPlugin('fetchWeather')
			  .then(function(data){
				//you can then do whatever you want with the data
				//such as generate your own custom markup
				$("<div/>", {"class" : "wi wi"+data.today.code})
				  .text(" "+data.today.temp.now + "°F")
				  .appendTo(custom_example);
			});
			
			/* //Data object from fetchWeather looks like this:
			{
			  location : String, //as returned back from api
			  today : {
				temp : {
					//temperatures are in units requested from api
					now : Number, ex. 18 
					min : Number, ex. 24
					max : Number ex. 12
				},
				desc : String, ex. "Partly Cloudy"
				code : Number, ex. "801" used by css font, see css.
				wind : {
					speed : 4, //either km/h or mph
					deg : Number, //direction in degrees from North
				},
				pressure : Number, //barometric pressure
				humidity : Number, //% humidity
				sunrise : Time,
				sunset : Time,
				day :  String,  
			
			  },
			  forecast : [
			  //array
				{
					Day: String, 
					code:Number, 
					desc: String, 
					temp : {min:number, max:number}
					}
				]
			}
			*/
			
		
		});
		</script>	

	<?php wp_footer(); ?>
</body>
</html>