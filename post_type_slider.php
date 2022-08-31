<?php add_action( 'init', 'slider_post_type' );
/**
 * Creating the custom post type
 *
 * This functions is attached to the 'init' action hook.
 */
function slider_post_type() {
	$labels = array(
		'name' => 'Slider',
		'singular_name' => 'All Slider Images',
		'add_new' => 'Add Slider Images',
		'add_new_item' => 'Add Slider Images',
		'edit_item' => 'Edit Slider Images',
		'new_item' => 'New Slider Images',
		'all_items' => __( 'All Slider Images' ),
		'view_item' => 'View Slider Images',
		'search_items' => 'Search Slider Images',
		'not_found' =>  'No Slider Images',
		'not_found_in_trash' => 'No Slider Images in the trash',
		'parent_item_colon' => '',
	);

	register_post_type( 'slider', array(
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