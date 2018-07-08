<?php

use _8webit\wp_stem\Google_Fonts;

include_once get_template_directory().'/customizer/helper.php';
include_once get_template_directory().'/customizer/assets.php';

add_action( 'admin_menu', 'coeus_customizer' );

function coeus_customizer(){
    add_menu_page('Coeus',
                    'Coeus',
                    'manage_options',
                    'coeus_customizer',
                    'coeus_customizer_site_identity',
                   get_template_directory_uri().'/assets/images/coeus_logo_menu.png' );

    add_submenu_page('coeus_customizer','Site Identity','Site Identity','manage_options','coeus_customizer');
                     
    add_submenu_page('coeus_customizer',
                     'Header',
                     'Header',
                     'manage_options',
                     'coeus_customizer_header_layout',
                     'coeus_customizer_header_layout');

    add_submenu_page('coeus_customizer',
                     'Primary Menu',
                     'Primary Menu',
                     'manage_options',
                     'coeus_customizer_primary_menu',
                     'coeus_customizer_primary_menu');

    add_submenu_page('coeus_customizer',
                     'Home',
                     'Home',
                     'manage_options',
                     'coeus_customizer_home_layout',
                     'coeus_customizer_home_layout');

    add_submenu_page('admin.php',
                     'Home/Modify Layout',
                     'Home/Modify Layout',
                     'manage_options',
                     'coeus_customizer_home_modify_layout',
                     'coeus_customizer_home_modify_layout');

    add_submenu_page('coeus_customizer',
                     'Post',
                     'Post',
                     'manage_options',
                     'coeus_customizer_post_layout',
                     'coeus_customizer_post_layout');
    
    add_submenu_page('admin.php',
                     'Post/Modify Layout',
                     'Post/Modify Layout',
                     'manage_options',
                     'coeus_customizer_post_modify_layout',
                     'coeus_customizer_post_modify_layout');

    add_submenu_page('admin.php',
                     'Post/Sidebar',
                     'Post/Sidebar',
                     'manage_options',
                     'coeus_customizer_post_sidebar',
                     'coeus_customizer_post_sidebar');

    add_submenu_page('coeus_customizer',
                    'Post List',
                    'Post List',
                    'manage_options',
                    'coeus_customizer_post_list_layout',
                    'coeus_customizer_post_list_layout');
    
    add_submenu_page('admin.php',
                    'Post List Layout Customizer',
                    'Post List Layout Customizer',
                    'manage_options',
                    'coeus_customizer_post_list_modify_layout',
                    'coeus_customizer_post_list_modify_layout');

    add_submenu_page('admin.php',
                    'Sidebar Customizer',
                    'Sidebar Customizer',
                    'manage_options',
                    'coeus_customizer_post_list_sidebar',
                    'coeus_customizer_post_list_sidebar');

    add_submenu_page('admin.php',
                    'Post List Button More',
                    'Post List Button More',
                    'manage_options',
                    'coeus_customizer_post_list_button_more',
                    'coeus_customizer_post_list_button_more');

    add_submenu_page('admin.php',
                    'Post List Layout',
                    'Post List Layout',
                    'manage_options',
                    'coeus_customizer_post_list_pagination',
                    'coeus_customizer_post_list_pagination');

    add_submenu_page('coeus_customizer',
                    'Sidebar',
                    'Sidebar',
                    'manage_options',
                    'coeus_customizer_sidebar_categories',
                    'coeus_customizer_sidebar_categories');

    add_submenu_page('admin.php',
                    'Sidebar/Recent Post',
                    'Sidebar/Recent Post',
                    'manage_options',
                    'coeus_customizer_sidebar_recent_post',
                    'coeus_customizer_sidebar_recent_post');

    add_submenu_page('admin.php',
                    'Sidebar/About',
                    'Sidebar/About',
                    'manage_options',
                    'coeus_customizer_sidebar_author',
                    'coeus_customizer_sidebar_author');


    add_submenu_page('admin.php',
                     'Advertisment',
                     'Advertisment',
                     'manage_options',
                     'coeus_customizer_ad',
                     'coeus_customizer_ad');

    add_submenu_page('coeus_customizer',
                     'Footer',
                     'Footer',
                     'manage_options',
                     'coeus_customizer_footer',
                     'coeus_customizer_footer');

    add_submenu_page('coeus_customizer',
                     'Social',
                     'Social',
                     'manage_options',
                     'coeus_customizer_social',
                     'coeus_customizer_social');

    add_action( 'admin_init', 'register_coues_customizer_settings');
}

function coeus_submenu_content($filename){
    include_once 'customizer_menu.php';
    
    echo '<div class="coeus-settings-content">';
    include_once 'views/' .$filename. '.php';
    echo '</div>';
}

function coeus_customizer_site_identity(){
    coeus_submenu_content('site_identity');
}

function coeus_customizer_header_layout(){
    coeus_submenu_content('header_layout');

}

function coeus_customizer_primary_menu(){
    coeus_submenu_content('primary_menu');
}

function coeus_customizer_sidebar_categories(){
    coeus_submenu_content('sidebar/categories');
}
function coeus_customizer_sidebar_recent_post(){
    coeus_submenu_content('sidebar/recent_post');
}
function coeus_customizer_sidebar_author(){
    coeus_submenu_content('sidebar/author');
}

function coeus_customizer_home_layout(){
    coeus_submenu_content('home/layout');
}

function coeus_customizer_home_modify_layout(){
    coeus_submenu_content('home/modify_layout');
}

function coeus_customizer_post_layout(){
    coeus_submenu_content('post/layout');
}

function coeus_customizer_post_modify_layout(){
    coeus_submenu_content('post/modify_layout');
}

function coeus_customizer_post_sidebar(){
    coeus_submenu_content('post/sidebar');
}

function coeus_customizer_post_list_layout(){
    coeus_submenu_content('post_list/layout');
}

function coeus_customizer_post_list_modify_layout(){
    coeus_submenu_content('post_list/modify_layout');
}

function coeus_customizer_post_list_sidebar(){
    coeus_submenu_content('post_list/sidebar');
}

function coeus_customizer_post_list_button_more(){
    coeus_submenu_content('post_list/button_more');
}

function coeus_customizer_post_list_pagination(){
    coeus_submenu_content('post_list/pagination');
}

function coeus_customizer_ad(){
    coeus_submenu_content('sidebar/ad');
}

function coeus_customizer_footer(){
    coeus_submenu_content('site_footer');
}

function coeus_customizer_social(){
    coeus_submenu_content('social');
}

function register_coues_customizer_settings(){
    // Site identity
    $site_identity = 'coeus-customizer-site-identity';

    register_setting( $site_identity, 'coeus_body_background_color');
    register_setting( $site_identity, 'coeus_brand_blogname' );
    register_setting( $site_identity, 'coeus_brand_logo' );
    register_setting( $site_identity, 'coeus_brand_title_color');
    register_setting( $site_identity, 'coeus_brand_display_only_logo');
    register_setting( $site_identity, 'coeus_primary_color');
    register_setting( $site_identity, 'coeus_text_color');
    register_setting( $site_identity, 'coeus_meta_color');
    Google_Fonts::register_setting($site_identity, 'coeus_brand_title_font');
    Google_Fonts::register_setting($site_identity, 'coeus_primary_font');
    Google_Fonts::register_setting($site_identity, 'coeus_text_font');
    Google_Fonts::register_setting($site_identity, 'coeus_meta_font');

    // Header layout
    $header_layout = 'coeus-customizer-header-layout';

    register_setting( $header_layout,'coeus_header_layout');
    register_setting( $header_layout,'coeus_header_bg');
	register_setting( $header_layout,'coeus_header_search_display');
    
    // Primary Menu
    $primary_menu = 'coeus-customizer-primary-menu';

    register_setting( $primary_menu, 'coeus_primary_nav_text_color');
    Google_Fonts::register_setting( $primary_menu, 'coeus_primary_nav_font');
    register_setting( $primary_menu, 'coeus_primary_nav_bg_hover');
    register_setting( $primary_menu, 'coeus_primary_nav_text_color_hover');
    // Home
    $home_layout = 'coeus-customizer-home';
    
    register_setting($home_layout, 'coeus_home_layout');

    $home_modify_layout = 'coeus-customizer-home-modify-layout';

    Google_Fonts::register_setting($home_modify_layout, 'coeus_home_modify_layout_title_font');
    register_setting($home_modify_layout, 'coeus_home_modify_layout_title_text_color');
    Google_Fonts::register_setting($home_modify_layout, 'coeus_home_modify_layout_excerpt_font');
    register_setting($home_modify_layout, 'coeus_home_modify_layout_excerpt_color');
    Google_Fonts::register_setting($home_modify_layout, 'coeus_home_modify_layout_meta_font');
    register_setting($home_modify_layout, 'coeus_home_modify_layout_meta_color');

    // Post List
    $post_list_layout = 'coeus-customizer-post-list-layout';

    register_setting( $post_list_layout, 'coeus_post_list_posts_per_page');
    register_setting( $post_list_layout, 'coeus_post_list_container');
    register_setting( $post_list_layout, 'coeus_post_list_layout');
    register_setting( $post_list_layout, 'coeus_post_list_column');
    register_setting( $post_list_layout, 'coeus_post_list_column_type');

    $post_list_modify_layout = 'coeus-customizer-post-list-modify-layout';
    
    register_setting( $post_list_modify_layout, 'coeus_post_list_item_bg_color');
    register_setting( $post_list_modify_layout, 'coeus_post_list_item_text_color');
    register_setting( $post_list_modify_layout, 'coeus_post_list_thumbnail_display');
    register_setting( $post_list_modify_layout, 'coeus_post_list_content_display');
    register_setting( $post_list_modify_layout, 'coeus_post_list_meta_display');
    Google_Fonts::register_setting( $post_list_modify_layout, 'coeus_post_list_title_font');
    register_setting( $post_list_modify_layout, 'coeus_post_list_title_color');
    Google_Fonts::register_setting( $post_list_modify_layout, 'coeus_post_list_content_font');

    $post_list_button_more = 'coeus-customizer-post-list-button-more';

    register_setting( $post_list_button_more, 'coeus_post_list_button_more_display');    
    register_setting( $post_list_button_more, 'coeus_post_list_button_more_bg_color');
    register_setting( $post_list_button_more, 'coeus_post_list_button_more_color');
    Google_Fonts::register_setting( $post_list_button_more, 'coeus_post_list_button_more_font');
    register_setting( $post_list_button_more, 'coeus_post_list_button_more_text');

    $post_list_pagination = 'coeus-customizer-post-list-pagination';

    register_setting( $post_list_pagination, 'coeus_post_list_pagination_shape');
    register_setting( $post_list_pagination, 'coeus_post_list_pagination_shape_bg_color');
    register_setting( $post_list_pagination, 'coeus_post_list_pagination_text_color');
    register_setting( $post_list_pagination, 'coeus_post_list_pagination_active_shape_bg_color');
    register_setting( $post_list_pagination, 'coeus_post_list_pagination_active_text_color');
    register_setting( $post_list_pagination, 'coeus_post_list_pagination_layout');

    $post_list_sidebar = 'coeus-customizer-post-list-sidebar';
    register_setting( $post_list_sidebar, 'sidebar_post_list_left' );
    register_setting( $post_list_sidebar, 'sidebar_post_list_right' );
    
    // Post
    $post_layout = 'coeus-customizer-post-layout';

    register_setting( $post_layout, 'coeus_post_container');
    register_setting( $post_layout, 'coeus_post_layout');

    $post_modify_layout = 'coeus-customizer-post-modify-layout';

    register_setting( $post_modify_layout, 'coeus_post_bg_color');
    Google_Fonts::register_setting( $post_modify_layout, 'coeus_post_title_font');
    register_setting( $post_modify_layout, 'coeus_post_title_color');
    Google_Fonts::register_setting( $post_modify_layout, 'coeus_post_content_font');
    register_setting( $post_modify_layout, 'coeus_post_content_color');
    register_setting( $post_modify_layout, 'coeus_post_meta_color');
    register_setting( $post_modify_layout, 'coeus_post_author_display');
    register_setting( $post_modify_layout, 'coeus_post_date_display');
    register_setting( $post_modify_layout, 'coeus_post_date_modified_display');
    register_setting( $post_modify_layout, 'coeus_post_category_display');
    register_setting( $post_modify_layout, 'coeus_post_category_text_color');
    register_setting( $post_modify_layout, 'coeus_post_category_text_bg_color');
    register_setting( $post_modify_layout, 'coeus_post_fb_button_display');
    
    $post_sidebar = 'coeus-customizer-post-sidebar';

    register_setting( $post_sidebar, 'sidebar_post_left' );
    register_setting( $post_sidebar, 'sidebar_post_right' );

    // Sidebar
    $sidebar_categories = 'coeus-customizer-sidebar-categories';

    register_setting( $sidebar_categories, 'coeus_sidebar_categories_bg_color' );
    register_setting( $sidebar_categories, 'coeus_sidebar_categories_color' );
    register_setting( $sidebar_categories, 'coeus_sidebar_categories_active_bg_color' );
    register_setting( $sidebar_categories, 'coeus_sidebar_categories_active_color' );
    
    $sidebar_recent_post = 'coeus-customizer-sidebar-recent-post';
    
    register_setting( $sidebar_recent_post, 'coeus_sidebar_recent_posts_background_color' );
    register_setting( $sidebar_recent_post, 'coeus_sidebar_recent_posts_title_display' );
    register_setting( $sidebar_recent_post, 'coeus_sidebar_recent_posts_title_color' );
    register_setting( $sidebar_recent_post, 'coeus_sidebar_recent_posts_thumbnail_shape' );
    register_setting( $sidebar_recent_post, 'coeus_sidebar_recent_posts_post_text_color' );
    register_setting( $sidebar_recent_post, 'coeus_sidebar_recent_posts_display_date' );
    
    $author = 'coeus-customizer-sidebar-author';

    register_setting( $author, 'coeus_sidebar_author_title' );
    register_setting( $author, 'coeus_sidebar_author_user' );
    register_setting( $author, 'coeus_sidebar_author_user_auto_detect' );
    register_setting( $author, 'coeus_sidebar_author_bg_color' );
    register_setting( $author, 'coeus_sidebar_author_text_color' );
    register_setting( $author, 'coeus_sidebar_author_avatar_shape' );
    
    // AD
    $ad = 'coeus-customizer-ad';

	register_setting( $ad, 'coeus_ad_adsense_client_id');
	register_setting( $ad, 'coeus_ad_adsense_query');
	register_setting( $ad, 'coeus_ad_adsense_enable');
	register_setting( $ad, 'coeus_ad_media');
	register_setting( $ad, 'coeus_ad_url');
	register_setting( $ad, 'coeus_ad_expiration_date');
    
    // Footer
    $footer = 'coeus-customizer-footer';

    register_setting( $footer, 'coeus_customizer_footer_display');
    register_setting( $footer, 'coeus_customizer_footer_layout');
    register_setting( $footer, 'coeus_customizer_footer_bg_color');
    register_setting( $footer, 'coeus_customizer_footer_text_color');
    register_setting( $footer, 'coeus_customizer_footer_copyright_text');
    register_setting( $footer, 'coeus_customizer_footer_social_link_display');

    // Social
	$social = 'coeus-customizer-social';

	register_setting( $social, 'coeus_social_fb_app_id');
	register_setting( $social, 'coeus_social_fb_link');
	register_setting( $social, 'coeus_social_twitter_link');
    register_setting( $social, 'coeus_social_google_plus_link');

}