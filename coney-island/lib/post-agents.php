<?php
add_action( 'add_meta_boxes', 'add_agent_type' );
function add_agent_type()
{
add_meta_box( 'my-meta-box-id', 'Review Info', 'add_agents', 'agents', 'normal', 'high' );
}

function add_agents( $post )
{
$values = get_post_custom( $post->ID );

$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';

$post_agents_testimonial = isset( $values['post_agents_testimonial'] ) ? esc_attr( $values['post_agents_testimonial'][0] ) : '';
$agents_state = isset( $values['agents_state'] ) ? esc_attr( $values['agents_state'][0] ) : '';
$agents_city = isset( $values['agents_city'] ) ? esc_attr( $values['agents_city'][0] ) : '';

$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>

<?php
global $wpdb;
$table_name = $wpdb->prefix . "posts";
$city_table = $wpdb->prefix . "cities";
$state_table = $wpdb->prefix . "state";
$cities_sql     = "SELECT * FROM $city_table order by city ASC";
$city_result  = mysql_query($cities_sql) or die (mysql_error().$agent_sql);

$state_sql     = "SELECT * FROM $state_table order by state ASC";
$state_result  = mysql_query($state_sql) or die (mysql_error().$agent_sql);

?>


<p>
<label for="my_meta_box_text"><b>Select State</b></label><br/>
<select name="agents_state" id="agents_state" style="width:100%;margin-top:10px;">
<?php while ($state_record = mysql_fetch_assoc($state_result)) { ?>
<option value="<?php echo $state_record['state_nick']; ?>" <?php selected( $agents_state, $state_record['state_nick'] ); ?> ><?php echo $state_record['state']; ?></option>
<?php } ?>

</select>
</p>



<p>
<label for="my_meta_box_text"><b>Select City</b></label><br/>
<select name="agents_city" id="agents_city" style="width:100%;margin-top:10px;">
<?php while ($city_record = mysql_fetch_assoc($city_result)) { ?>
<option value="<?php echo $city_record['city']; ?>" <?php selected( $agents_city, $city_record['city'] ); ?> ><?php echo $city_record['city']; ?></option>
<?php } ?>

</select>
</p>



<?php
}
add_action( 'save_post', 'cd_agents_save' );
function cd_agents_save( $post_id )
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

if( isset( $_POST['post_agents_testimonial'] ) )
update_post_meta( $post_id, 'post_agents_testimonial', esc_attr( $_POST['post_agents_testimonial'] ) );

if( isset( $_POST['agents_state'] ) )
update_post_meta( $post_id, 'agents_state', esc_attr( $_POST['agents_state'] ) );


if( isset( $_POST['agents_city'] ) )
update_post_meta( $post_id, 'agents_city', esc_attr( $_POST['agents_city'] ) );


}


?>