
<?php
include('lib/common-function.php');
global $wpdb;
$table_name = $wpdb->prefix . "cities";
$idFieldName     = "city_id";
$statusFieldName = "status";
$recordName      = "Record";  // like 'News', 'record'
$pageNameItself  = "admin.php?page=add_locations";
$eid  = $_GET['eid'];
$task = $_GET['task'];
$url = "admin.php?page=add_locations";


if(count($_POST)>0) { 
for($i=0;$i<count($_POST['chk']);$i++) {

if($_POST['modeForSelected']=='A'){
$resultsStatus=mysql_query("update $table_name set $statusFieldName='A' where $idFieldName=".$_POST['chk'][$i]);
$msg = "Activated Successfully!!";
}

if($_POST['modeForSelected']=='D'){
$resultsStatus=mysql_query("update $table_name set $statusFieldName='D' where $idFieldName=".$_POST['chk'][$i]);
$msg = "Deactivated Successfully!!";
}

if($_POST['modeForSelected']=='delete'){	
global $wpdb;
$images_record = $wpdb->get_results("SELECT * FROM $table_name where $idFieldName='".$_POST['chk'][$i]."'");
$image         =  $images_record[0]->image;

$resultsDelete=mysql_query("delete from $table_name where $idFieldName=".$_POST['chk'][$i]);
$msg = "Successfully deleted!!";
}

}
}


// ****************** operation for change status   *****************************************/
if( (isset($_GET['status']) && $_GET['status']!='') && (isset($_GET['id']) && $_GET['id']!='') && (!count($_POST)>0)  ) {
$resultsStatus=mysql_query("update $table_name set $statusFieldName='".$_GET['status']."' where $idFieldName=".$_GET['id']);
$msg = "Status Changed Successfully!!";
}

//****************** operation for delete record ********************************************/
if( (isset($_GET['delete']) && $_GET['delete']!='') && (isset($_GET['id']) && $_GET['id']!='') && (!count($_POST)>0) ) {
global $wpdb;
$images_record = $wpdb->get_results("SELECT * FROM $table_name where $idFieldName='".$_GET['id']."'");
$image         =  $images_record[0]->image;

$resultsDelete=mysql_query("delete from $table_name where $idFieldName=".$_GET['id']);
$msg = "Successfully deleted!!";		
}

if($msg !=""){
$msgs[] = $msg; 
$_SESSION['SuccessMessage'] = $msgs;
//echo "<pre>";print_r($_SESSION);//die();
//redirectBrowser($pageNameItself);
}


//************************************* code for list record and pagination and search****************************************
$auto = "1";
/* code for listing records */
$autoincrement = 1;
require('lib/myPagina.php');
$pagina = new MyPagina();
$pagina->rows_on_page(20);
$statusSA=$_POST['statusSA'];
$gallery_sql =  "SELECT * FROM $table_name order by city_id desc";

if(isset($_POST['search_submit']))
{
$gallery_sql .=  " where email like'%".$_POST['search']."%' ";   
}



	
$pagina->sql = $gallery_sql;
$city_record = $pagina->get_page_result();
$showPaging = $pagina->navigation();
if($_REQUEST['page'] > 0){
$autoincrement = ($_REQUEST['page'] * 20) + 1;
} else {
$autoincrement = 1;
}


//***************************************************** end code for list record and pagination and search*******************



/******************************************************************* code start for fetch Edit record ************/
if($eid!="" && is_numeric($eid))
{
$user_record    = $wpdb->get_results("SELECT * FROM $table_name where $idFieldName='$eid'");

$city            =  $user_record[0]->city;
$state           =  $user_record[0]->state;




}
/****************************************** code end for fetch Edit record ****************************************/

if(isset($_POST['insert_city'])){

$errorMsg = array();
$city          =   trim(addslashes($_POST['city']));
$state           =   trim(addslashes($_POST['state']));


if($city=="")
{
$errorMsg[] = "Please Enter City.";
}

if($state=="")
{
$errorMsg[] = "Please Select State.";
}


if (count($errorMsg) > 0 ) {
$_SESSION['ErrorMessage'] =$errorMsg;
}

else {

/***************************************** code start for insert and update record ***********************/
if($task=="edit" )
{
$sql = "update $table_name set
city             =   '".$city."',
state              =   '".$state."',
status           =    'A' where $idFieldName='".$eid."'  ";
$insert_record       =  mysql_query($sql) ;
$last_id                   =  mysql_insert_id();
$msg[] = "Successfully Updated!";
} else {

echo $sql = "insert into $table_name set
city             =   '".$city."',
state              =   '".$state."',
status           =    'A',
date             = now()  ";
$insert_record    =  mysql_query($sql) ;
$last_id          =  mysql_insert_id();
$msg[]            = "Successfully Added!";

}

$_SESSION['SuccessMessage'] = $msg;
redirectpage($url);

}

}
$state_table = $wpdb->prefix . "state";
$state_sql     = "SELECT * FROM $state_table order by 'state'  ";
$state_result  = mysql_query($state_sql) or die (mysql_error().$agent_sql);



/***************************************** code End for insert and update record *************/
?>




<script language="javascript">
function checkUncheckAll(theElement) {
var theForm = theElement.form, z = 0;
for(z=0; z<theForm.length;z++){
if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall'){
theForm[z].checked = theElement.checked;
}
}
}

function checkDelete(id) {
if(confirm("Do you really want to delete this <?php echo $recordName?> ?")){
window.location.href="<?php echo $pageNameItself?>&delete=y&id="+id;
}

}

</script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/gallery/css/gallery.css" />

<div >
<?php echo  getStatusMessage(); ?>

</div>
<form name="videos" id="videos" method="post" enctype="multipart/form-data">
<table class="wp-list-table widefat fixed users" cellspacing="0">
 
<tr>
<td>City</td>
<td>
<input type="text" class="span6" id="city" name="city" value="<?php echo $city; ?>">

</td>
</tr>

<tr>
<td>State</td>
<td>

<select class="span6" name="state" id="state" style="width:191px;">
<option value="">select state</option>
<?php while ($state_record = mysql_fetch_assoc($state_result)) { ?>
<option value="<?php echo $state_record['state_nick']; ?>" <?php if($state_record['state_nick']==$state){ echo "selected='selected' ";} ?> ><?php echo $state_record['state']; ?></option>
<?php } ?>

</select>



</td>
</tr>
<tr><td>
<input type="submit" name="insert_city" id="insert_city" value="<?php if($_GET['task']=="edit") { echo "Update City";} else { echo "Add City";} ?>"></td></tr>

</table></form>

<br><br>


<form name="form1" action='' method='post'>
<table class="wp-list-table widefat fixed users" cellspacing="0">
<tr>
<th width="82">ID</th>
<th width="40"><input name="selectAll" type="checkbox" onclick="javascript:checkUncheckAll(this)" style="margin:0px;" /></th>

<th>city</th>
<th>State</th>
<th>Action</th>
</tr>
<?php

//echo "<pre>";print_r($plan_record);


if(is_array($city_record) && count($city_record)>0){
foreach($city_record as $val) {  ?>
<tr>
<td><?php echo $auto++; ?></td>
<td> <input name="chk[]" type="checkbox" value="<?php  echo  $val[$idFieldName];  ?>" /></td>
<td> <?php echo $val['city'];  ?></td>
<td> <?php echo $val['state'];  ?></td>
<td>
<a HREF="#" onclick="javascript:checkDelete(<?php echo $val[$idFieldName];?>);" title='Click to delete'>
Delete</a>

<a HREF="admin.php?page=add_locations&task=edit&eid=<?php echo $val[$idFieldName];?>" title='Click to Edit'>
Edit</a>

<!--
<a href="admin.php?page=add_edit_user&task=edit&eid=<?php  echo  $val[$idFieldName];  ?>" >
<img src="<?php echo $plugin_url; ?>/plans/plans/images/edit.jpg" style="height:32px;width:32px;"></a>
-->
</td>
</tr>

<?php }  }   else {?>

<tr><td colspan="8" style="color:red;font-size:14px;text-align:center;">
Record is Empty</td></tr>

<?php } ?>


<td colspan="3">
<select name="modeForSelected" style="width:122px;">
<option value="">Select</option>
<option value="delete">Delete</option>
</select> <input type="submit" value="Delete" name="submit" class="submit-button"> </td>
</table></form>
<div style="text-align:center;"><?php echo $showPaging; ?></div>





