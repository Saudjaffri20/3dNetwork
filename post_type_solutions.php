<?php add_action( 'init', 'solution_post_type' );
/**
 * Creating the custom post type
 *
 * This functions is attached to the 'init' action hook.
 */
function solution_post_type() {
	$labels = array(
		'name' => 'Solution',
		'singular_name' => 'All Solutions',
		'add_new' => 'Add Solutions',
		'add_new_item' => 'Add Solutions',
		'edit_item' => 'Edit Solutions',
		'new_item' => 'New Solutions',
		'all_items' => __( 'All Solutions' ),
		'view_item' => 'View Solutions',
		'search_items' => 'Search Solutions',
		'not_found' =>  'No Solutions',
		'not_found_in_trash' => 'No Solutions in the trash',
		'parent_item_colon' => '',
	);

	register_post_type( 'solutions_s', array(
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