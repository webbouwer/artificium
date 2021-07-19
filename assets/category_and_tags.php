<?php


// apply categories to media attachments
function protago_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'protago_add_categories_to_attachments' );

// apply tags to media attachments
function protago_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'protago_add_tags_to_attachments' );

// source https://code.tutsplus.com/articles/applying-categories-tags-and-custom-taxonomies-to-media-attachments--wp-32319
