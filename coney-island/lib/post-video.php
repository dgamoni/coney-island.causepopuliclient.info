<?php
add_action( 'add_meta_boxes', 'add_video_type' );
function add_video_type()
{
add_meta_box( 'my-meta-box-id', 'Review Info', 'add_videos', 'video', 'normal', 'high' );
}

function add_videos( $post )
{
$values = get_post_custom( $post->ID );

$video_community = isset( $values['video_community'] ) ? esc_attr( $values['video_community'][0] ) : '';


$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>

<?php
global $wpdb;
$table_name = $wpdb->prefix . "posts";
$city_table = $wpdb->prefix . "cities";
$state_table = $wpdb->prefix . "state";

$community_sql="SELECT * FROM $table_name WHERE post_status='publish' and post_type='communities'  ";
$community_result =  mysql_query($community_sql) or die (mysql_error().$community_sql);

?>


<p>
<label for="my_meta_box_text"><b>Select Communities</b></label><br/>
<select name="video_community" id="video_community" style="width:100%;margin-top:10px;">
<?php while ($community_post = mysql_fetch_assoc($community_result)) { ?>

<option value="<?php echo get_permalink($community_post['ID']); ?>" <?php selected( $video_community, get_permalink($community_post['ID']) ); ?>><?php echo $community_post['post_title']; ?></option>
<?php } ?>
</select>

</p>






<?php
}
add_action( 'save_post', 'cd_video_save' );
function cd_video_save( $post_id )
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


if( isset( $_POST['video_community'] ) )
update_post_meta( $post_id, 'video_community', esc_attr( $_POST['video_community'] ) );




}


?>