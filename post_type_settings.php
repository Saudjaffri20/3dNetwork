<?php add_action( 'init', 'setting_post' );
/**
 * Creating the custom post type
 *
 * This functions is attached to the 'init' action hook.
 */
function setting_post() {
	$labels = array(
		'name' => 'Setting',
		'singular_name' => 'All Post',
		'add_new' => 'Add Post',
		'add_new_item' => 'Add Post',
		'edit_item' => 'Edit Post',
		'new_item' => 'New Post',
		'all_items' => __( 'All Post' ),
		'view_item' => 'View Post',
		'search_items' => 'Search Post',
		'not_found' =>  'No Post',
		'not_found_in_trash' => 'No Post in the trash',
		'parent_item_colon' => '',
	);

	register_post_type( 'setting_s', array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'exclude_from_search' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 10,
		'supports' => array( 'title','editor','thumbnail' ),
		//'taxonomies' => array('category', 'post_tag')
	
	) );

}
?>