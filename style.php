<?php
use _8webit\wp_stem\Google_Fonts;
use _8webit\Style_Renderer\Style_Renderer;
Style_Renderer::init([
    'site_identity' => [
        'colors' => [
            'body_bg' => get_option('coeus_body_background_color'),
            'brand_title' => get_option('coeus_brand_title_color'),
            'primary' => get_option('coeus_primary_color'),
            'primary_bg' => '',
            'secondary' => '',
            'secondary_bg' => ''
        ],
        'fonts' => [
            'brand_title' =>  Google_Fonts::get_option('coeus_brand_title_font')
        ]
    ],
    'header' => [
        'colors' => [
            'bg' => get_option('coeus_header_bg')
        ]
    ],
    'primary_menu' => [
        'colors'=> [
            'item' => get_option('coeus_primary_nav_text_color'),
            'item_hover' => get_option('coeus_primary_nav_text_color_hover'),
            'item_hover_bg' => get_option('coeus_primary_nav_bg_hover')
        ],
        'fonts' => [
            'item' => Google_Fonts::get_option('coeus_primary_nav_font')
        ]
    ],
    'home'  => [
        'colors' => [
            'post_title' => get_option('coeus_home_modify_layout_title_text_color'),
            'post_excerpt' => get_option('coeus_home_modify_layout_excerpt_color'),
            'post_meta' => get_option('coeus_home_modify_layout_meta_color'),
        ],
        'fonts' => [
            'post_title' => Google_Fonts::get_option('coeus_home_modify_layout_title_font'),
            'post_excerpt' => Google_Fonts::get_option('coeus_home_modify_layout_excerpt_font'),
            'post_meta' => Google_Fonts::get_option('coeus_home_modify_layout_meta_font')
        ]
    ],
    'post_list' => [
        'colors' => [
            'post_bg' => get_option('coeus_post_list_item_bg_color'),
            'post_title' => get_option('coeus_post_list_title_color'),
            'post_content' => get_option('coeus_post_list_item_text_color'),
            'button_more_bg' => get_option('coeus_post_list_button_more_bg_color'),
            'button_more_text' => get_option('coeus_post_list_button_more_color'),
            'pagination_text' => get_option('coeus_post_list_pagination_text_color'),
            'pagination_bg' => get_option('coeus_post_list_pagination_shape_bg_color'),
            'pagination_active_bg' => get_option('coeus_post_list_pagination_active_shape_bg_color'),
            'pagination_active' => get_option('coeus_post_list_pagination_active_text_color')
        ],
        'fonts' => [
            'post_title' => Google_Fonts::get_option('coeus_post_list_title_font'),
            'post_content' => Google_Fonts::get_option('coeus_post_list_content_font'),
            'button_more' => Google_Fonts::get_option('coeus_post_list_button_more_font'),
        ],
        'shape' => [
            'pagination' => get_option('coeus_post_list_pagination_shape')
        ]
    ],
    'post' => [
        'colors' => [
            'bg' => get_option('coeus_post_bg_color'),
            'title' => get_option( 'coeus_post_title_color' ),
            'content' => get_option( 'coeus_post_content_color' ),
            'meta_color' => get_option( 'coeus_post_meta_color' ),
            'category_bg' => get_option( 'coeus_post_category_text_bg_color' ),
            'category_text' => get_option( 'coeus_post_category_text_color' ),
        ],
        'fonts' => [
            'title' => Google_Fonts::get_option( 'coeus_post_title_font' ),
            'content' => Google_Fonts::get_option( 'coeus_post_content_font' )
        ]
    ],
    'sidebars' => [
        'colors' => [
            'categories_text' => get_option( 'coeus_sidebar_categories_color' ),
            'categories_bg' => get_option( 'coeus_sidebar_categories_bg_color' ),
            'categories_active_text' => get_option( 'coeus_sidebar_categories_active_color' ),
            'categories_active_bg' => get_option( 'coeus_sidebar_categories_active_bg_color' ),
            'recent_posts_title' => get_option( 'coeus_sidebar_recent_posts_title_color' ),
            'recent_posts_text' =>  get_option( 'coeus_sidebar_recent_posts_post_text_color' ),
            'recent_posts_bg' => get_option( 'coeus_sidebar_recent_posts_background_color' ),
            'author_text' => get_option( 'coeus_sidebar_author_text_color' ),
            'author_bg' => get_option( 'coeus_sidebar_author_bg_color' )
        ],
        'display' => [
            'recent_posts_title' => get_option( 'coeus_sidebar_recent_posts_title_display' ),
            'recent_post_data' => get_option( 'coeus_sidebar_recent_posts_display_date' )
        ],
        'shape' => [
            'recent_post_thumbnail' => get_option( 'coeus_sidebar_recent_posts_thumbnail_shape' ),
            'sidebar_author_avatar' => get_option( 'coeus_sidebar_author_avatar_shape' ),
        ]
    ],
    'footer' => [
        'colors' => [
            'bg' => get_option( 'coeus_customizer_footer_bg_color' ),
            'text' => get_option( 'coeus_customizer_footer_text_color' )
        ]
    ]
]);
Style_Renderer::render_google_fonts_link();
Style_Renderer::render();
