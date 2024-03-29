<?php
/* Artificium child
 * functions.php
 */

require get_stylesheet_directory() . '/assets/collection_taxonomy.php';
require get_stylesheet_directory() . '/assets/post_types.php';

/********* Wordpress Hooks & filters *********/
/********* Theme Content Exension Functions *********/

function getCollections(){

  $tax = 'collection';
  //return json_encode( get_terms( $tax ) );
	// https://developer.wordpress.org/reference/functions/the_terms/
  $collections = get_terms( $tax, array(
  	'taxonomy' => $tax,
  	'hide_empty' => false,
  	'parent' => 0,
  ) );

  //print_r($my_terms);
	foreach($collections as $collection) {
		echo '<a class="btn  btn-default " href="' . get_category_link($collection->term_id) . '">' . $collection->name . '</a>';
 	}
}

function getCollectionsAndPosts(){

	$collection_slug = get_queried_object()->slug;
	$collection_name = get_queried_object()->name;

	echo '<h2>'.$collection_name.'</h2>';

	$get_post_args = array(
	                    'post_type' => 'artifact', // Your Post type Name that You Registered
	                    'posts_per_page' => 999,
	                    'order' => 'ASC',
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'collection',
	                            'field' => 'slug',
	                            'terms' => $collection_slug
	                        )
	                    )
	                );
	$collection_posts = new WP_Query($get_post_args);

	if($collection_posts->have_posts()) :
	                 while($collection_posts->have_posts()) :
	                      $collection_posts->the_post();
	                      echo '<div class="post-excerpt">';
	          echo '<h2 class="entry-title" itemprop="headline"><a href="'.get_the_permalink().'" class="entry-title-link">'.get_the_title().'</a></h2>
	                      <div class="entry-content">'.get_the_excerpt().'</div></div>';

	    endwhile;
	endif;
}

function getArtifacts(){

  $pst = 'artifact';

  $my_posts = array(
    'post_type' => $pst,
    'posts_per_page' => -1
  );
  $the_query = new WP_Query( $my_posts );
  //print_r($the_query);
  while ( $the_query->have_posts() ) : $the_query->the_post();

    echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';
    echo apply_filters('the_content', the_content());

  endwhile;

}

/********* Theme Custom Functions *********/
