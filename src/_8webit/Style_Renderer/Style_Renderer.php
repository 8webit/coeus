<?php
namespace _8webit\Style_Renderer;

use _8webit\wp_stem\Google_Fonts;

class Style_Renderer{
    private static $model; 
    private static $style;

    public static function init($args){
        Style_Renderer::$model =  new Coeus_Style_Model($args);
    }

    public static function render(){
        echo '<style>';
        Style_Renderer::site_identity();
        Style_Renderer::header();
        Style_Renderer::primary_menu();
        Style_Renderer::home();
        Style_Renderer::post_list();
        Style_Renderer::post();
        Style_Renderer::sidebar();
        Style_Renderer::footer();
        echo '</style>';
    }

    public static function render_google_fonts_link($render_link_element = true){
        $result = array();
        $fields = Style_Renderer::$model->get_all();

        foreach($fields as $group => $prop){
            if(isset($prop['fonts'])){
                foreach($prop['fonts'] as $meta_name => $meta_value){
                    if(!empty($meta_value)){
                        $result[] = $meta_value;
                    }
                }
            }
        }
        $font_links = Google_Fonts::links($result);

        if($render_link_element){
            echo '<link href="' . $font_links . '" rel="stylesheet" />';
        }else{
            echo $font_links;
        }
    }
    
    private static function site_identity(){
        $group = 'site_identity';
        ?>
        .pure-menu-heading.brand-title {
            color: <?php echo Style_Renderer::$model->get_color($group, 'brand_title'); ?>;
            <?php Google_Fonts::style(Style_Renderer::$model->get_font($group, 'brand_title')); ?>
        }
        body,
        app-home-alfa .sticky-post .title,
        app-home-alfa .sticky-post .categories,
        app-home-alfa .sticky-post .category{
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'body_bg'); ?>;
        }
        app-home-beta .sticky .card{
            border-left-color: <?php echo Style_Renderer::$model->get_color($group, 'primary'); ?> !important;
            border-right-color: <?php echo Style_Renderer::$model->get_color($group, 'primary'); ?> !important;
        }
        <?php
    }

    private static function header(){
        ?>
        .coeus-main-header {
            background-color: <?php echo Style_Renderer::$model->get_color('header', 'bg') ?>;
        } 
        <?php       
    }

    private static function primary_menu(){
        $group = 'primary_menu';
        ?>
        .wp_stem-menu-parent>a,
        .wp_stem-menu-child-item {
            color: <?php echo Style_Renderer::$model->get_color($group, 'item'); ?>;
            <?php Google_Fonts::style(Style_Renderer::$model->get_font($group, 'item')); ?>
        }

        .wp_stem-menu-parent>a:hover,
        .wp_stem-menu-child-item:hover,
        .wp_stem-menu-parent>a.active,
        .wp_stem-menu-child-item.active {
            color: <?php echo Style_Renderer::$model->get_color($group, 'item_hover'); ?>;
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'item_hover_bg'); ?>;
        }
        .wp_stem-menu-child{
            background-color: <?php echo Style_Renderer::$model->get_color('header', 'bg'); ?>
        }

        /* Header Search Box, Hamburger */
        @media screen and (max-width:1024px){
            header app-search-box .search-label .material-icons{
                color: <?php echo Style_Renderer::$model->get_color($group, 'item') ?>;
            }
            header .hamburger-inner, 
            header .hamburger-inner::after,
            header .hamburger-inner::before{
                background-color: <?php echo Style_Renderer::$model->get_color($group, 'item') ?>;
            }
        }
        <?php
    }

    private static function home(){
        $group = 'home';
        ?>
        app-home-alfa .title,
        app-home-beta .title{
            color: <?php echo Style_Renderer::$model->get_color($group, 'post_title'); ?>;
            <?php  echo Google_fonts::style( Style_Renderer::$model->get_font($group, 'post_title') ); ?>    
        }

        app-home-alfa .content,
        app-home-beta .excerpt{
            color: <?php echo Style_Renderer::$model->get_color($group, 'post_excerpt'); ?>;
            <?php echo Google_fonts::style( Style_Renderer::$model->get_font($group, 'post_excerpt') ); ?>
        }
        
        app-home-alfa .category,
        app-home-alfa .date,
        app-home-beta .category-section .name,
        app-home-beta .category-section .see-all,
        app-home-beta .category-section .post .meta .date,
        app-home-beta .category-section .post .meta .author{
            color: <?php echo Style_Renderer::$model->get_color($group, 'post_excerpt'); ?>;
            <?php Google_fonts::style(Style_Renderer::$model->get_color($group, 'post_excerpt')); ?>
        }
        <?php 
    }

    private static function post_list(){
        $group = 'post_list';
        ?>
        .post-list-item-container{
            color: <?php echo  Style_Renderer::$model->get_color($group, 'post_content'); ?>;
            background-color: <?php echo  Style_Renderer::$model->get_color($group, 'post_bg'); ?>;
        }
        .post-list-item-container .post-meta-author,
        .post-list-item-container .post-meta-author .name,
        .post-list-item-container .post-meta-date{
            color: <?php echo  Style_Renderer::$model->get_color($group, 'post_content'); ?>;
        }
        
        .post-list-item-container  .post-title {
            <?php Google_Fonts::style( Style_Renderer::$model->get_font($group, 'post_title') ); ?>
            color: <?php echo  Style_Renderer::$model->get_color($group, 'post_title');?>;
        }
        
        .post-list-item-container .content,
        .post-list-item-container .content p,
        .post-list-item-container .post-meta-author,
        .post-list-item-container .post-meta-date,
        .post-list-item-container .post-content {
           <?php Google_Fonts::style( Style_Renderer::$model->get_font($group, 'post_content')); ?>
        }
        
        .read-more {
            <?php Google_Fonts::style( Style_Renderer::$model->get_font($group, 'button_more')); ?>
            color: <?php echo Style_Renderer::$model->get_color($group, 'button_more_text'); ?>;
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'button_more_bg');?>;
        }
        
        .pagination-next,
        .pagination-previous{
            color: <?php echo Style_Renderer::$model->get_color($group, 'pagination_text'); ?>;
        }
        
        .pagination {
            <?php  echo Style_Renderer::$model->get_shape($group, 'pagination') == 'circle' 
                        ? 'border-radius: 50%;' : '';?>
            color: <?php echo Style_Renderer::$model->get_color($group, 'pagination_text'); ?>;
            background-color: <?php echo  Style_Renderer::$model->get_color($group, 'pagination_bg'); ?>;
        }
        
        .pagination.active{
            color: <?php echo  Style_Renderer::$model->get_color($group, 'pagination_active') ?>;
            background-color: <?php echo  Style_Renderer::$model->get_color($group, 'pagination_active_bg') ?>;
        }
        <?php        
    }

    private static function post(){
        $group = 'post';
        ?>
        .post-area{
            background-color: <?php echo  Style_Renderer::$model->get_color($group, 'bg');?>;
        }
        
        .post-area .post-title{
            <?php Google_Fonts::style( Style_Renderer::$model->get_font($group, 'title') ); ?>
            color: <?php echo  Style_Renderer::$model->get_color($group, 'title'); ?>;
        }
        .post-area .post-content,
        .post-area .content,
        .post-area .content p{
            <?php Google_Fonts::style( Style_Renderer::$model->get_font($group, 'content') ); ?>
            color:<?php echo  Style_Renderer::$model->get_color($group, 'content'); ?>;
        }
        
        .post-area .post-meta,
        .post-area .post-meta a,
        .post-area .date,
        .post-area .date-modified,
        .post-area .author-container,
        .post-area .author-container a{
            color:<?php echo  Style_Renderer::$model->get_color($group, 'meta_color'); ?>;
        }
        .post-area .post-meta a:hover{
            text-decoration: underline;
        }
        .post-area .category{
            color: <?php echo Style_Renderer::$model->get_color($group, 'category_text');?>;
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'category_bg');?>;
        }
        <?php 
    }

    private static function sidebar(){
        $group = 'sidebars';
        ?>
        .categories-sidebar-list{
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'categories_bg'); ?>;
        }
        .categories-sidebar-list-item{
            color: <?php echo Style_Renderer::$model->get_color($group, 'categories_text'); ?>;
        }
        .categories-sidebar-list-item.active{
            color: <?php echo Style_Renderer::$model->get_color($group, 'categories_active_text'); ?>;
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'categories_active_bg'); ?>;
        }
        .sidebar-recent-posts{
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'recent_posts_bg');?>;
        }
        .sidebar-recent-posts-title{
            color: <?php echo Style_Renderer::$model->get_color($group, 'recent_posts_title'); ?>;
            display:<?php echo empty(Style_Renderer::$model->get_display($group, 'recent_posts_title')) ? 'none' : 'block'; ?>;
        }
        .sidebar-recent-posts .feature-media{
            <?php if(Style_Renderer::$model->get_shape($group, 'recent_post_thumbnail') == 'circle'): ?>
            width: 50px !important; 
            border-radius: 50%;
            <?php endif; ?>
        }
        .sidebar-recent-posts-post-title .title-link,
        .sidebar-recent-posts-post-date{
            color:<?php echo Style_Renderer::$model->get_color($group, 'recent_posts_text'); ?>;
        }
        
        .sidebar-recent-posts-post-date{
            display:<?php echo empty( Style_Renderer::$model->get_display($group, 'recent_post_data') ) ? 'none' : 'block' ?>;
        }
        .sidebar-author,
        .sidebar-author a{
            color: <?php echo Style_Renderer::$model->get_color($group, 'author_text');?>;
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'author_bg'); ?>;
        }
        .sidebar-author .avatar img{
            <?php if(Style_Renderer::$model->get_shape($group, 'sidebar_author_avatar')  == 'circle'): ?>
            border-radius: 50%;
            <?php endif; ?>
        }
        <?php 
    }

    private static function footer(){
        $group = 'footer';
        ?>
        footer{
            color: <?php echo Style_Renderer::$model->get_color($group, 'text') ?>;
            background-color: <?php echo Style_Renderer::$model->get_color($group, 'bg') ?>;
        }
        <?php
    }
}