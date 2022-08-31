<?php add_action( 'init', 'news_post_type' );
/**
 * Creating the custom post type
 *
 * This functions is attached to the 'init' action hook.
 */
function news_post_type() {
	$labels = array(
		'name' => 'News',
		'singular_name' => 'All News',
		'add_new' => 'Add News',
		'add_new_item' => 'Add News',
		'edit_item' => 'Edit News',
		'new_item' => 'New News',
		'all_items' => __( 'All News' ),
		'view_item' => 'View FNews',
		'search_items' => 'Search News',
		'not_found' =>  'No News',
		'not_found_in_trash' => 'No News in the trash',
		'parent_item_colon' => '',
	);

	register_post_type( 'news_s', array(
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
		'taxonomies' => array('category', 'post_tag')
	
	) );
}

?>