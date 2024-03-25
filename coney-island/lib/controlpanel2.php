<?php
 
if (!function_exists('wp_nav_menu') || get_option("TWYtheme_wp_menu")) :

$options2 = array (

		array(
				"name" => "Logo",
				"desc" => "Please enter file URL of your logo",
				"id" => $shortname."_logo_url",
				"type" => "TWYtheme_upload"),
                
);
else:


$options2 = array (
		array(
				"name" => "Logo",
				"desc" => "Please enter file URL of your logo",
				"id" => $shortname."_logo_url",
				"type" => "TWYtheme_upload"),
		
                
);

endif;

$this_file="controlpanel2.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel2.php' == $_REQUEST['page'] ) {
		foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

							
			header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}
?>