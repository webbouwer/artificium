<?php
// all post data global
function wp_main_theme_get_postdata(){
        $args = array(
            //'tag'               => json_encode($this->tagfilter),
            //'category_name'     => json_encode($this->catfilter),
            //'post_type'         => 'post', // 'any',  = incl pages
            //'post__not_in'      => $this->loadedID,
            'post_status'       => 'publish',
            'orderby'           => 'date',
            'order'             => 'DESC',      // 'DESC', 'ASC' or 'RAND'
            'posts_per_page'  => -1,
            //'posts_offset'      => $ppload,
            //'suppress_filters'  => false,
        );
        $query = new WP_Query( $args );
        $response = array();
        $count = array();
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                // post text
                $excerpt_length = 120; // words
                $post = get_post($post->id);
                $fulltext = $post->post_content;//  str_replace( '<!--more-->', '',);
                $content = apply_filters('the_content', $fulltext );
                $excerpt = truncate( $content, $excerpt_length, '', false, true );  // get_the_excerpt()
                $response[] = array(
                    'id' => get_the_ID(),
                    'link' => get_the_permalink(),
                    'title' => get_the_title(),
                    'image' => get_the_post_thumbnail(),
                    'excerpt' => $excerpt,
                    'content' => $content,
                    'cats' => wp_get_post_terms( get_the_ID(), 'category', array("fields" => "slugs")),
                    'tags' => wp_get_post_terms( get_the_ID(), 'post_tag', array("fields" => "slugs")),
                    'date' => get_the_date(),
                    'timestamp' => strtotime(get_the_date()),
                    'author' => get_the_author(),
                    'custom_field_keys' => get_post_custom_keys()
                );
            endwhile;
        else:
           $response[0] = 'No posts found';
        endif;
        wp_reset_query();
        ob_clean();
        //wp_die();
        return $response;
}

function wp_main_theme_get_customizer(){
    return json_encode( get_theme_mods() );
}
function wp_main_theme_get_all_posts(){
    return json_encode( wp_main_theme_get_postdata() );
}
function wp_main_theme_get_all_tags(){
    return json_encode( get_terms( 'post_tag' ) );
}
function wp_main_theme_get_all_categories(){
    return json_encode( get_categories( array("type"=>"post") ) );
}
