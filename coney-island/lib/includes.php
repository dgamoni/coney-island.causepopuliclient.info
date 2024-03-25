<?php
$shortname="fl";
$categories = get_categories(array('hide_empty'=>false));
$TWY_getcat = array();

foreach ($categories as $category_list ) {
       $TWY_getcat[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages();
$TWY_getpages = array();
foreach ($pages as $page_list ) {
       $TWY_getpages[$page_list ->ID] = $page_list ->post_title;
}

$pages_top_level = get_pages('sort_column=menu_order&depth=0');
$TWY_gettoplevelpages = array();
foreach ($pages_top_level as $page_list ) {
       if ($page_list->post_parent == "0") {
       $TWY_gettoplevelpages[$page_list ->ID] = $page_list ->post_title;
       }
}

$posts=query_posts('posts_per_page=-1');
$TWY_getposts = array();
foreach ($posts as $page_list ) {
       $TWY_getposts[$page_list ->ID] = $page_list ->post_title;
}
wp_reset_query();


add_action('admin_print_scripts','TWYtheme_admin_scripts');
add_action('admin_print_styles', 'admin_head_addition');
add_action('admin_menu', 'TWY_theme_option_menu');

require_once(TEMPLATEPATH . '/lib/TWY_theme_functions.php');
require_once(TEMPLATEPATH . '/lib/controlpanel.php');

?>