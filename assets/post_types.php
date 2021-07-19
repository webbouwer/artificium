<?php

// register new posttype
function protago_add_artifact_post_type() {

    // Set UI labels for Custom Post Type
    $labels = array(
          'name'                => _x( 'Artifacts', 'Post Type General Name', 'protago' ),
          'singular_name'       => _x( 'Artifact', 'Post Type Singular Name', 'protago' ),
          'menu_name'           => __( 'Artifacts', 'protago' ),
          'parent_item_colon'   => __( 'Parent Artifact', 'protago' ),
          'all_items'           => __( 'All Artifacts', 'protago' ),
          'view_item'           => __( 'View Artifact', 'protago' ),
          'add_new_item'        => __( 'Add New Artifact', 'protago' ),
          'add_new'             => __( 'Add New', 'protago' ),
          'edit_item'           => __( 'Edit Artifact', 'protago' ),
          'update_item'         => __( 'Update Artifact', 'protago' ),
          'search_items'        => __( 'Search Artifact', 'protago' ),
          'not_found'           => __( 'Not Found', 'protago' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'protago' ),
    );

    $args = array(
        'label'               => __( 'artifacts', 'protago' ),
        'description'         => __( 'Artifact info and media', 'protago' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','capabilities'),
        'taxonomies'          => array( 'collection', 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           =>'dashicons-portfolio',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );
    register_post_type( 'artifact',  $args );
}
add_action( 'init', 'protago_add_artifact_post_type' );

/* apply collection to artifact post type */
// https://developer.wordpress.org/reference/functions/register_taxonomy/
// https://developer.wordpress.org/reference/functions/register_taxonomy_for_object_type/
function protago_add_collection_to_artifacts() {
    register_taxonomy_for_object_type( 'collection', 'artifact' );
}
add_action( 'init' , 'protago_add_collection_to_artifacts' );
