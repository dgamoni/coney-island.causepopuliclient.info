<?php



add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
add_meta_box( 'my-meta-box-id', 'Review Info', 'cd_meta_box_cb', 'property-listing', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
$values = get_post_custom( $post->ID );

$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';

$listing_state = isset( $values['listing_state'] ) ? esc_attr( $values['listing_state'][0] ) : '';
$listing_city = isset( $values['listing_city'] ) ? esc_attr( $values['listing_city'][0] ) : '';

$post_agents = isset( $values['post_agents'] ) ? esc_attr( $values['post_agents'][0] ) : '';

$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>

<?php
global $wpdb;
$table_name = $wpdb->prefix . "posts";
$city_table = $wpdb->prefix . "cities";
$state_table = $wpdb->prefix . "state";

$cities_sql     = "SELECT * FROM $city_table order by city ASC ";
$city_result  = mysql_query($cities_sql) or die (mysql_error().$agent_sql);

$state_sql     = "SELECT * FROM $state_table order by state ASC ";
$state_result  = mysql_query($state_sql) or die (mysql_error().$agent_sql);


$community_sql="SELECT * FROM $table_name WHERE post_status='publish' and post_type='communities'  ";
$community_result =  mysql_query($community_sql) or die (mysql_error().$community_sql);
//echo "<pre>";print_r($community_post);echo "</pre>";


$agent_sql     = "SELECT * FROM $table_name WHERE post_status='publish' and post_type='agents'  ";
$agent_result  = mysql_query($agent_sql) or die (mysql_error().$agent_sql);

?>

<p>
<label for="my_meta_box_text"><b>Select Communities</b></label><br/>
<select name="my_meta_box_select" id="my_meta_box_select" style="width:100%;margin-top:10px;">
<?php while ($community_post = mysql_fetch_assoc($community_result)) { ?>

<option value="<?php echo $community_post['ID']; ?>" <?php selected( $selected, $community_post['ID'] ); ?>><?php echo $community_post['post_title']; ?></option>
<?php } ?>
</select>

</p>



<p>
<label for="my_meta_box_text"><b>Select Agent</b></label><br/>
<select name="post_agents" id="post_agents" style="width:100%;margin-top:10px;">
<?php while ($agents_record = mysql_fetch_assoc($agent_result)) { ?>
<option value="<?php echo $agents_record['ID']; ?>" <?php selected( $post_agents, $agents_record['ID'] ); ?> ><?php echo $agents_record['post_title']; ?></option>
<?php } ?>

</select>
</p>



<p>
<label for="my_meta_box_text"><b>Select State</b></label><br/>
<select name="listing_state" id="listing_state" style="width:100%;margin-top:10px;">
<?php while ($state_record = mysql_fetch_assoc($state_result)) { ?>
<option value="<?php echo $state_record['state_nick']; ?>" <?php selected( $listing_state, $state_record['state_nick'] ); ?> ><?php echo $state_record['state']; ?></option>
<?php } ?>

</select>
</p>



<p>
<label for="my_meta_box_text"><b>Select City</b></label><br/>
<select name="listing_city" id="listing_city" style="width:100%;margin-top:10px;">
<?php while ($city_record = mysql_fetch_assoc($city_result)) { ?>
<option value="<?php echo $city_record['city']; ?>" <?php selected( $listing_city, $city_record['city'] ); ?> ><?php echo $city_record['city']; ?></option>
<?php } ?>

</select>
</p>






<?php
}
add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
// Bail if we're doing an auto save
if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

// if our nonce isn't there, or we can't verify it, bail
if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

// if our current user can't edit this post, bail
if( !current_user_can( 'edit_post' ) ) return;

// now we can actually save the data
$allowed = array(
'a' => array( // on allow a tags
'href' => array() // and those anchords can only have href attribute
)
);

// Probably a good idea to make sure your data is set


if( isset( $_POST['my_meta_box_select'] ) )
update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );

if( isset( $_POST['post_agents'] ) )
update_post_meta( $post_id, 'post_agents', esc_attr( $_POST['post_agents'] ) );


if( isset( $_POST['listing_state'] ) )
update_post_meta( $post_id, 'listing_state', esc_attr( $_POST['listing_state'] ) );


if( isset( $_POST['listing_city'] ) )
update_post_meta( $post_id, 'listing_city', esc_attr( $_POST['listing_city'] ) );


}

// function for show rating content
//$key_1_value = get_post_meta($post->ID, 'my_meta_box_text', true);
?>