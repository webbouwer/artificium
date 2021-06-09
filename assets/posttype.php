<?php
/**
 * Theme post type functions
 */

 // Register Custom Taxonomy
function artifact_collections() {

 	$labels = array(
 		'name'                       => __( 'Collections', 'Taxonomy General Name', 'artificium' ),
 		'singular_name'              => __( 'Collection', 'Taxonomy Singular Name', 'artificium' ),
 		'menu_name'                  => __( 'Collection', 'artificium' ),
 		'all_items'                  => __( 'All collections', 'artificium' ),
 		'parent_item'                => __( 'Parent collection', 'artificium' ),
 		'parent_item_colon'          => __( 'Parent collection:', 'artificium' ),
 		'new_item_name'              => __( 'New collection name', 'artificium' ),
 		'add_new_item'               => __( 'Add New Collection', 'artificium' ),
 		'edit_item'                  => __( 'Edit Collection', 'artificium' ),
 		'update_item'                => __( 'Update Collection', 'artificium' ),
 		'view_item'                  => __( 'View Collection', 'artificium' ),
 		'separate_items_with_commas' => __( 'Separate collections with commas', 'artificium' ),
 		'add_or_remove_items'        => __( 'Add or remove collections', 'artificium' ),
 		'choose_from_most_used'      => __( 'Choose from the most used', 'artificium' ),
 		'popular_items'              => __( 'Popular Collections', 'artificium' ),
 		'search_items'               => __( 'Search Collections', 'artificium' ),
 		'not_found'                  => __( 'Not Found', 'artificium' ),
 		'no_terms'                   => __( 'No Collections', 'artificium' ),
 		'items_list'                 => __( 'Collection list', 'artificium' ),
 		'items_list_navigation'      => __( 'Collection list navigation', 'artificium' ),
 	);
 	$capabilities = array(
 		'manage_terms'               => 'manage_categories',
 		'edit_terms'                 => 'manage_categories',
 		'delete_terms'               => 'manage_categories',
 		'assign_terms'               => 'edit_category',
 	);
 	$args = array(
 		'labels'                     => $labels,
 		'hierarchical'               => true,
 		'public'                     => true,
 		'show_ui'                    => true,
 		'show_admin_column'          => true,
 		'show_in_nav_menus'          => true,
 		'show_tagcloud'              => true,
 		'capabilities'               => $capabilities,
 		'show_in_rest'               => true,
 	);
 	register_taxonomy( 'collection', array( 'post', 'page', 'attachment' ), $args );

 }
 add_action( 'init', 'artifact_collections', 0 );

 function add_collections_to_posttypes() {
     register_taxonomy_for_object_type( 'collection', array( 'post', 'page', 'attachment' ) );
 }
 add_action( 'init' , 'add_collections_to_posttypes' );


?>
