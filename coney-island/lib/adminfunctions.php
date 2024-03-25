<?php
function TWYtheme_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-jquery.asmselect', get_bloginfo('template_url').'/lib/jquery.asmselect.js', array());
	wp_enqueue_script('my-jquery.asmselect');
	wp_register_script('TWYtheme_upload', get_bloginfo('template_url').'/lib/script.js', array());
	wp_enqueue_script('TWYtheme_upload');
}

function admin_head_addition() {	
	$admin_stylesheet_url = get_bloginfo('template_url').'/lib/admin.css';
	echo '<link rel="stylesheet" href="'. $admin_stylesheet_url . '" type="text/css" />';
	wp_enqueue_style('thickbox');
}

function TWY_theme_option_menu(){
	$TWYtheme_option_name = "TWY-Theme";
	$TWYtheme_page1="General Options";
	$TWYtheme_page1_file="controlpanel.php";
	
	add_menu_page($TWYtheme_option_name, $TWYtheme_option_name, 7,$TWYtheme_page1_file, 'TWYgeneral');
  	add_submenu_page($TWYtheme_page1_file, $TWYtheme_page1, $TWYtheme_page1, 7, $TWYtheme_page1_file, 'TWYgeneral');
}

function TWY_generate_welcome() {?>
<table width="100%">
    <tr align="left" > 
    <td style="-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;border:1px solid #FFFFFF;padding:3px;background:#F4F4F4;font-size:11px;">
		<h2 style="color:#BA3F42;font-size:19px;margin-left:10px;font-weight:normal;"><i>Welcome to Family League-Theme Settings</i></h2>
    </td>
</tr> 
</table>
<?php
}

function TWY_generate_form($options,$form_id) { ?>
	<form method="post" id="<?php echo $form_id;?>">
	<table class="optiontable">
	<?php foreach ($options as $value) { ?>

		<!-- text box -->
		<?php if ($value['type'] == "text") { ?>
		<table  id="table_<?php echo $value['id']; ?>">
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?></small></th>
			<td  class="TWY_panel_td_right">
			 <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
			</td>
		</tr> 
		</table>
		<!--/ text box -->

		<!-- upload box -->
		<?php } elseif ($value['type'] == "TWYtheme_upload") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?></small></th>
			<td class="TWY_panel_td_right">
			 <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo htmlentities(get_settings( $value['id'] )); } else { echo htmlentities($value['std']); } ?>" size="40" /><input  class="TWYtheme_upload_button <?php echo $value['id']; ?> button"  type="button" value="Upload" />
			</td>
		</tr> 
		</table>
		<!--/ upload box -->

		<!-- textarea-->
		<?php } elseif ($value['type'] == "textarea") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td class="TWY_panel_td_right">
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="50" rows="8"/><?php if ( get_settings( $value['id'] ) != "") { echo  (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea>
			</td>
		</tr> 
		</table>
		<!--/ textarea-->

		<!-- select-->
		<?php } elseif ($value['type'] == "select") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td class="TWY_panel_td_right">
					<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<option <?php if ( get_settings( $value['id'] ) == 0) { echo ' selected="selected"'; } ?> value="0">Please Select</option>

					<?php foreach ($value['options'] as $op_val=>$option) { ?><option<?php if ( get_settings( $value['id'] ) == $op_val) { echo ' selected="selected"'; } elseif ($op_val == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo $op_val; ?>"><?php echo $option; ?></option><?php } ?></select>
			</td>
		</tr> 
		</table>
		<!--/ select -->

		<!-- select multiple-->
		<?php } elseif ($value['type'] == "selectmultiple_pages") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small>
			</th>
			<td class="TWY_panel_td_right">
					<select style="width:240px;height:200px;" size="2"  multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" title="Please Select">

					<?php 
					//once secilmisleri listeleyelim sirasiyla
								$secilen_sayfalar = split(',', get_settings($value['id']) );
								$toplam_secilen_sayfa = count($secilen_sayfalar);
								for ($i = 0; $i < $toplam_secilen_sayfa -1; $i++) {
									$sayfa =get_pages('include='.$secilen_sayfalar[$i].'');
					?>
					<option value="<?php echo $sayfa[0]->ID; ?>" selected><?php echo $sayfa[0]->post_title; ?></option>
					<?php } ?>


					<?php
					//daha onceden secilmisleri yazmiyoruz	
					foreach ($value['options'] as $op_val=>$option) { ?>
					
							<?php  
							if (get_settings($value['id']) != "" ) {			
								$bol=split(',',get_settings($value['id']));
								foreach ($bol as $ddd){
										if ($ddd == $op_val && $ddd != 0) {  
											$atla=1;
										}
									}
							}?>
							<?php
								if (!$atla){
							?>
							<option   value="<?php echo $op_val; ?>" <?php echo $atla;?>>
							<?php
							}	
							$atla="";
							?>
					<?php echo $option; ?>
					</option><?php } ?>
					</select>

			</td>
		</tr> 
		</table>
		<!--/ select -->


		<!-- select multiple-->
		<?php } elseif ($value['type'] == "selectmultiple") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td class="TWY_panel_td_right">
					<select style="width:240px;height:200px;" size="2"  multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" title="Please Select">
					<?php foreach ($value['options'] as $op_val=>$option) { ?><option <?php  if (get_settings($value['id']) != "" ) {$bol=split(',',get_settings($value['id']));foreach ($bol as $ddd){if ($ddd == $op_val && $ddd != 0) { echo ' selected="selected"';}}}?>  value="<?php echo $op_val; ?>"><?php echo $option; ?></option><?php } ?></select>
			</td>
		</tr> 
		</table>
		<!--/ select -->

		<!-- check box-->
		<?php } elseif ($value['type'] == "checkbox") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="TWY_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td  class="TWY_panel_td_right">
				<input type="checkbox" id="<?php echo $value['id']; ?>" style="margin-left:10px;" name="<?php echo $value['id']; ?>" value="true"   <?php if(get_settings($value['id'])) echo "checked"; ?> 		/>
			</td>
		</tr> 
		</table>
		<!--/ check box -->

		<!--headings-->
		<?php } elseif ($value['type'] == "heading") { ?>
		<table width="750">
			<tr align="left" > 
			<td class="headings">
				<h2><span class="headings"><?php echo $value['name']; ?></span></h2>
				<p><?php echo $value['desc']; ?> </p>
			</td>
		</tr> 
		</table>
		<!--/ headings-->

	<?php } ?>
	<?php 
	}
	?>
	</table>
	<p class="submit">
	<input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>">
	<input name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
	</p>
	</form>
<?php  } ?>
<?php function TWY_response(){
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong> settings reset.</strong></p></div>';
}?>
<?php

function TWYgeneral(){	
	global $options;
	TWY_generate_welcome();
	$ca=TWYtheme_menu('1');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	TWY_response();
	TWY_generate_form($options,'TWYgeneral');
	echo "</div>";
}	



function TWYtheme_menu($page){?>
<div class="wrap">
<h2><?php echo $optionpage_top_level; ?></h2>
<ul id="tabnav">
	<li><a class="<?php if ($page=="1") echo "active";?>" href="?page=controlpanel.php"> General Options</a></li>
</ul>
<?php }?>