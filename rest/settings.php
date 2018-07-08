<?php
function coues_rest_get_settings(){
    $result = array();

    // Miscellaneous
    $result['uri'] =  get_stylesheet_directory_uri();
    $result['language'] = get_bloginfo('language');
    $result['brand']['url'] = get_bloginfo('url');
    $result['page_on_front'] = intval(get_option('page_on_front'));
    
    $args = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-home.php'
    ];
    if(count(get_posts( $args )) > 0){
      $id = get_posts( $args )[0];
      $result['og_image'] = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), "post-thumbnail" );
    }

    // Header
    $result['header']['layout'] = get_option('coeus_header_layout');
    $result['header']['search']['display'] = !empty(get_option('coeus_header_search_display')) ? true : false;
    $result['header']['social_buttons']['display'] = !empty(get_option('coeus_header_social_buttons_display')) ? true : false;

    // Brand
    $logo = wp_get_attachment_image_url( get_option('coeus_brand_logo'),'full');
    $title = get_bloginfo('name');   
    $only_logo = get_option('coeus_brand_display_only_logo');

    if(!empty($title) && empty($only_logo)){
      $result['brand']['title'] = $title; 
    }
    if(!empty($logo)){
      $result['brand']['logo'] = $logo;
    }

    // Home
    $result['home']['layout'] = get_option('coeus_home_layout', 'alfa');
    
    // Post List
    $display_button_more= get_option('coeus_post_list_button_more_display');

    $result['pagination']['posts_per_page'] = intval(get_option('coeus_post_list_posts_per_page',10));
    
    if(get_option('coeus_post_list_pagination_layout') == 'buttons' 
      || get_option('coeus_post_list_pagination_layout') == 'both'  ){
        $result['pagination']['buttons'] = true;
    }

    if(get_option('coeus_post_list_pagination_layout') == 'numbers' 
    || get_option('coeus_post_list_pagination_layout') == 'both' ){
        $result['pagination']['numbers'] = true;
    }
    $result['post_list']['container'] = get_option('coeus_post_list_container');
    $result['post_list']['layout'] = get_option('coeus_post_list_layout', 'alfa');
    $result['post_list']['column'] = intval(get_option('coeus_post_list_column'));
    $result['post_list']['column_type'] = get_option('coeus_post_list_column_type');
    $result['post_list']['meta_display'] = get_option('coeus_post_list_meta_display');
    $result['post_list']['content_display'] = get_option('coeus_post_list_content_display');
    $result['post_list']['thumbnail_display'] = get_option('coeus_post_list_thumbnail_display');
    if($display_button_more){
        $result['post_list']['button_more']['text'] = get_option('coeus_post_list_button_more_text');
    }

    $result['post_list']['sidebars']['left'] = json_decode(get_option('sidebar_post_list_left'));
    $result['post_list']['sidebars']['right'] = json_decode(get_option('sidebar_post_list_right'));
    
    // Post
    $result['post']['container'] = get_option('coeus_post_container');
    $result['post']['layout'] = get_option('coeus_post_layout');
    $result['post']['author']= get_option('coeus_post_author_display');
    $result['post']['display_date'] = get_option('coeus_post_date_display');
    $result['post']['display_date_modified'] = get_option('coeus_post_date_modified_display');
    $result['post']['category'] = get_option('coeus_post_category_display');
    $result['post']['fb_buttons'] =get_option('coeus_post_fb_button_display');
    $result['post']['sidebars']['left'] = json_decode(get_option('sidebar_post_left'));
    $result['post']['sidebars']['right'] = json_decode(get_option('sidebar_post_right'));

    $result['sidebar']['author']['title'] = get_option('coeus_sidebar_author_title');
    $result['sidebar']['author']['name'] = get_option('coeus_sidebar_author_user'); 
    $result['sidebar']['author']['auto_detect'] = get_option('coeus_sidebar_author_user_auto_detect'); 
   
    $result['ad']['adsense'] = !empty(get_option('coeus_ad_adsense_enable')) ? true : false;
    
   $date = strtotime(get_option('coeus_ad_expiration_date'));
       
    if( !get_option('coeus_ad_adsense_enable')
        &&  !(strtotime( get_option('coeus_ad_expiration_date') ) < strtotime( current_time('d-m-Y') ) ) ){
        $result['ad']['media'] = wp_get_attachment_url( get_option('coeus_ad_media') );
        $result['ad']['url'] = get_option('coeus_ad_url');
    }

    // Footer
    $result['footer']['display'] = get_option('coeus_customizer_footer_display');
    $result['footer']['layout'] = get_option('coeus_customizer_footer_layout');
    $result['footer']['copyright_text'] = get_option('coeus_customizer_footer_copyright_text');
    $result['footer']['social_link_display'] = get_option('coeus_customizer_footer_social_link_display');

    // Social
    $result['social']['fb'] = get_option('coeus_social_fb_link');
    $result['social']['twitter'] = get_option('coeus_social_twitter_link');
    $result['social']['gplus'] = get_option('coeus_social_google_plus_link');

    return (object)$result;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'coeus/v1', '/settings', array(
    'methods' => 'GET',
    'callback' => 'coues_rest_get_settings',
  ));
});