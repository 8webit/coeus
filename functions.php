<?php
require __DIR__.'/vendor/autoload.php';

use _8webit\wp_stem\Stem;

include_once 'customizer/options.php';

include_once 'rest/categories.php';
include_once 'rest/menus.php';
include_once 'rest/settings.php';

Stem::init();

if (!function_exists('coeus_setup')) :
    function coeus_setup()
    {
        load_theme_textdomain('coeus', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'coeus'),
        ));
        

        register_nav_menus(array(
            'top' => esc_html__('Top', 'coeus'),
        ));
    }
endif;

add_action('after_setup_theme', 'coeus_setup');

add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%category%/%postname%/' );
} );

function wpdocs_theme_setup() {
    add_theme_support( 'post-thumbnails' ); 

    add_image_size( 'small', 300, 157,true);
    add_image_size( 'medium', 600, 315,true);
    add_image_size( 'large', 1200, 630,true );
    
    set_post_thumbnail_size(1200, 630, true);
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

// clean WP_head()
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); 

if(!function_exists('coues_insert_home_page')){
    function coues_insert_home_page(){
        $home_page_id = 0;
        // change the Sample page to the home page
        if (isset($_GET['activated']) && is_admin()){
            $home_page_title = 'Home';
            $home_page_content = '';
            $home_page_check = get_page_by_title($home_page_title);
            $home_page = array(
                'post_type' => 'page',
                'post_title' => $home_page_title,
                'post_content' => $home_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
                'post_slug' => 'home',
                'page_template'  => 'template-home.php'
            );
            if(!isset($home_page_check->ID) && !get_page_by_path('home')){
                $home_page_id = wp_insert_post($home_page);
                update_option( 'page_on_front', $home_page_id );
                update_option( 'show_on_front', 'page' );
            }
        }
    }
    add_action('after_switch_theme', 'coues_insert_home_page');
}



/**
 * just for debuging
 *
 * @param $value
 */
function dd($value)
{
    echo "<pre> \n ";
    echo var_dump($value);
    echo "\n </pre> \n ";
}