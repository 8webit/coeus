<?php
function coeus_rest_categories_latest_post(){
    register_rest_field('category', 'latest_posts', array(
        'get_callback' => function($data){
            $args = array(
                'numberposts'   => 4,
                'post_status'   => 'publish',
                'exclude'       => get_option( 'sticky_posts' ),
                'category'      => $data['id']
            );
            $posts = get_posts($args);

            foreach($posts as $key => $post){
                unset($posts[$key]->{'post_content'});
                unset($posts[$key]->{'post_excerpt'});
                $posts[$key]->{'author_name'} = get_the_author_meta('display_name', $post -> post_author);
                $posts[$key]->{'author_link'} = get_author_posts_url($post -> post_author);
                $posts[$key]->{'thumbnail'} = get_the_post_thumbnail_url($post,'large');
            }

            return $posts;
        }
    ));
}   
add_action('rest_api_init','coeus_rest_categories_latest_post');
