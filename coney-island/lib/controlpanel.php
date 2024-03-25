<?php
 
if (!function_exists('wp_nav_menu') || get_option("TWYtheme_wp_menu")) :

$options = array (

		array(
				"name" => "Logo",
				"desc" => "Please enter file URL of your logo",
				"id" => $shortname."_logo_url",
				"type" => "TWYtheme_upload"),
		array(
				"name" => "Favicon",
				"desc" => "Please enter file URL of your favicon cion",
				"id" => $shortname."_favicon_url",
				"type" => "TWYtheme_upload"),
		array(
				"name" => "Phone number",
				"desc" => "Enter your Phone No. It's showing in Header right area.",
 				"id" => $shortname."_phone1",
				"type" => "text",
				"std"  => "999-999-9999"),
		array(
				"name" => "Home page contant",
				"desc" => "Enter your contant It's showing in bottom of slider on Home page.",
 				"id" => $shortname."_contant",
				"type" => "textarea"),
		array(
				"name" => "Footer Settings",
				"type" => "heading"),

		array(
				"name" => "Choose footer pages",
				"desc" => "Please select pages which you want display on middle column of the footer.",
				"id" => $shortname."_footer_pages[]",
				"options" => $TWY_getpages,
				"type" => "selectmultiple_pages"),
 
 		array(
				"name" => "Footer Left Area",
				"desc" => "
						<blockquote style=\"font-size:11px;\"><u>example</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
									Copyright &copy; 2009 Company Name, Inc.
						</blockquote>
				",
 				"id" => $shortname."_footer_copy",
				"type" => "text"),

		array("name" => "Site Map page link",
				"id" => $shortname."_sitemap_link",
				"type" => "text"),
		               
		array("name" => "Google Analytics Tracking Code",
				"id" => $shortname."_anayltics",
				"type" => "textarea"),
		array(
				"name" => "Social Media Setting",
				"type" => "heading"),

		array(
				"name" => "Social Media Icons",
				"desc" => "To use social media icons you must add a line like below;<br />
						social media name|your url ,<br />

						<blockquote style=\"font-size:11px;\"><u>example</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
										<span style=\"color:#33CC00;\">twitter</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_twitter_url</span><span style=\"color:#FF0000;\">,	 </span>			<br />
										<span style=\"color:#33CC00;\">rss</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_rss_url</span><span style=\"color:#FF0000;\">,
										</span>			<br />
										<span style=\"color:#33CC00;\">flickr</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_flickr_url</span><span style=\"color:#FF0000;\">,		 </span>			<br />
										<span style=\"color:#33CC00;\">facebook</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_facebook_url</span><span style=\"color:#FF0000;\">,	 </span>		<br />
						</blockquote>
						<blockquote style=\"font-size:11px;\"><u>available names for social media icons</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
							<ul class=\"key_list\">
							<li>youtube</li>
							<li>blogger</li>
							<li>delicious</li>
							<li>digg</li>
							<li>facebook </li>
							<li>feedburner</li>
							<li>flickr</li>
							<li>furl </span>&nbsp;  
							<li>google</li>
							<li>lastfm</li>
							<li>linkedin</li>
							<li>netvibes</li>
							<li>newsvine</li>
							<li>rss </span>&nbsp; 
							<li>stumbleupon</li>
							<li>technorati</li>
							<li>twitter</li>
							<li>wordpress</li>
							<li>yahoo</li>
							</ul>
						<br style=\"display:block;clear:both;\" />
						</blockquote>
						please do not forget to put comma at the end of each line!
				",
 				"id" => $shortname."_social_media_icons",
				"type" => "textarea"),
                
);
else:


$options = array (

	array(
				"name" => "Contact Email",
				"desc" => "Paste Here contact form email",
 				"id" => $shortname."_contact_email",
                 "std"  => "manjit.mittal555@gmail.com",
				"type" => "text"),

		array(
				"name" => "Logo",
				"desc" => "Please enter file URL of your logo",
				"id" => $shortname."_logo_url",
				"type" => "TWYtheme_upload"),
				
				array(
				"name" => "Footer Logo",
				"desc" => "Please enter file URL of your footer logo",
				"id" => $shortname."_foot_logo_url",
				"type" => "TWYtheme_upload"),

      	
				
		array(
				"name" => "Favicon",
				"desc" => "Please enter file URL of your favicon cion",
				"id" => $shortname."_favicon_url",
				"type" => "TWYtheme_upload"),
				
			
                
             /* Social Media  icons*/
             array(
				"name" => "Social Media",
				"type" => "heading"),
				array(
			"name" => "Paste Facebook Link ",
			"desc" => "Paste Here Facebook link",
			"id" => $shortname."_facebook_link",
			"type" => "text"),
			
			
             
			array(
			"name" => "Paste Twitter Link ",
			"desc" => "Paste Here Twitter link",
			"id" => $shortname."_twitter_link",
			"type" => "text"),
			
     		array(
			"name" => "Paste Instagram Link ",
			"desc" => "Paste Here Instagram link",
			"id" => $shortname."_instagram",
			"type" => "text"),
				
	      
				
		array(
				"name" => "Footer Settings",
				"type" => "heading"),
 
 		array(
				"name" => "Footer copy right",
				"desc" => "Copyright &copy; 2009 Company Name, Inc.",
 				"id" => $shortname."_footer_copy",
                                "std"  => "All rights are reserved. ",
				"type" => "textarea"),

       
	   	array("name" => "Footer Content title",
		"desc" => "Enter footet content title here",
				"id" => $shortname."_foot_title",
				"type" => "text"),
	   
				
		
				
	
                
		
);

endif;

$this_file="controlpanel.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel.php' == $_REQUEST['page'] ) {
		foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

							//TWYtheme_pages[]
							if($_REQUEST['TWYtheme_pages']!=""){
								$slider_category_final="";
								foreach($_REQUEST['TWYtheme_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "TWYtheme_pages[]", $slider_category_final);
							}

							if($_REQUEST['TWYtheme_footer_pages']!=""){
								//TWYtheme_footer_pages[]
								$slider_category_final="";
								foreach($_REQUEST['TWYtheme_footer_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "TWYtheme_footer_pages[]", $slider_category_final);
							}
	

							if($_REQUEST['TWYtheme_blog_box_cat']!=""){
								//TWYtheme_blog_box_cat[]
								$slider_category_final="";
								foreach($_REQUEST['TWYtheme_blog_box_cat']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "TWYtheme_blog_box_cat[]", $slider_category_final);
							}


							//TWYtheme_ex_pages[]
							if($_REQUEST['TWYtheme_top_pages']!=""){
								$slider_category_final="";
								foreach($_REQUEST['TWYtheme_top_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "TWYtheme_top_pages[]", $slider_category_final);
							}

			header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}
?>