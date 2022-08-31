<?php add_action( 'init', 'faq_post_type' );
/**
 * Creating the custom post type
 *
 * This functions is attached to the 'init' action hook.
 */
function faq_post_type() {
	$labels = array(
		'name' => 'Faq',
		'singular_name' => 'All Faqs',
		'add_new' => 'Add Faq',
		'add_new_item' => 'Add Faq',
		'edit_item' => 'Edit Faq',
		'new_item' => 'New Faq',
		'all_items' => __( 'All Faqs' ),
		'view_item' => 'View Faq',
		'search_items' => 'Search Faq',
		'not_found' =>  'No Faq',
		'not_found_in_trash' => 'No Slider Images in the trash',
		'parent_item_colon' => '',
	);

	register_post_type( 'faq', array(
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