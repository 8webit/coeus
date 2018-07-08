<?php
namespace _8webit\Style_Renderer;

class Coeus_Style_Model{
    private $site_identity = [
        'colors' => [
            'body_bg' => '',
            'brand_title' => '',
            'primary' => '',
            'primary_bg' => '',
            'secondary' => '',
            'secondary_bg' => ''
        ],
        'fonts' => [
            'brand_title' => ''
        ]
    ];

    private $header = [
        'colors' => [
            'bg' => ''
        ]
    ];

    private $primary_menu = [
        'colors'=> [
            'item' => '',
            'item_hover' => '',
            'item_hover_bg' => ''
        ],
        'fonts' => [
            'item' => ''
        ]
     ];

    private $home = [
        'colors' => [
            'post_title' => '',
            'post_excerpt' => '',
            'post_meta' => '',
        ],
        'fonts' => [
            'post_title' => '',
            'post_excerpt' => '',
            'post_meta' => ''
        ]
    ];

    private $post_list = [
        'colors' => [
            'post_bg' => '',
            'post_title' => '',
            'post_content' => '',
            'button_more_bg' => '',
            'button_more_text' => '',
            'pagination_bg' => '',
            'pagination_text' => '',
            'pagination_active_bg' => '',
            'pagination_active' => ''
        ],
        'fonts' => [
            'post_title' => '',
            'post_content' => '',
            'button_more' => '',
        ],
        'shape' => [
            'pagination' => ''
        ]
    ];

    private $post = [
        'colors' => [
            'bg' => '',
            'title' => '',
            'content' => '',
            'meta_color' => '',
            'category_bg' => '',
            'category_text' => '',
        ],
        'fonts' => [
            'title' => '',
            'content' => ''
        ]
    ];

    private $sidebars = [
        'colors' => [
            'categories_text' => '',
            'categories_bg' => '',
            'categories_active_text' => '',
            'categories_active_bg' => '',
            'recent_posts_title' => '',
            'recent_posts_text' =>  '',
            'recent_posts_bg' => '',
            'author_text' => '',
            'author_bg' => ''
        ],
        'display' => [
            'recent_posts_title' => '',
            'recent_post_data' => ''
        ],
        'shape' => [
            'recent_post_thumbnail' => '',
            'sidebar_author_avatar' => '',
        ]
    ];

    private $footer = [
        'colors' => [
            'bg' => '',
            'text' => ''
        ]
    ];

    public function __construct($arg){
        if(is_array($arg) && count($arg) > 0){
            if(isset($arg['site_identity'])){
                $this->set_site_identity($arg['site_identity']);
            }

            if(isset($arg['header'])){
                $this->set_header($arg['header']);
            }

            if(isset($arg['primary_menu'])){
                $this->set_primary_menu($arg['primary_menu']);
            }

            if(isset($arg['home'])){
                $this->set_home($arg['home']);
            }

            if(isset($arg['post_list'])){
                $this->set_post_list($arg['post_list']);
            }


            if(isset($arg['post'])){
                $this->set_post($arg['post']);
            }

            if(isset($arg['sidebars'])){
                $this->set_sidebars($arg['sidebars']);
            }

            if(isset($arg['footer'])){
                $this->set_footer($arg['footer']);
            }
        }
    }

    public function get($group, $property, $meta){
        $result = $this->get_group($group);
        return $result[$property][$meta];
    }
    public function get_all(){
        return array(
            'site_identity' => $this->get_site_identity(),
            'header' => $this->get_header(),
            'primary_menu' => $this->get_primary_menu(),
            'home' => $this->get_home(),
            'post_list' => $this->get_post_list(),
            'post' => $this->get_post(),
            'sidears' => $this->get_sidebars(),
            'footer' => $this->get_footer()
        );
    }

    public function get_group($group){
        $result = [];
        switch($group){
            case 'site_identity':
                $result = $this->get_site_identity();
                break;
            case 'header':
                $result = $this->get_header();
                break;
            case 'primary_menu':
            $result = $this->get_primary_menu();
            break;
            
            case 'home':
                $result = $this->get_home();
            break;

            case 'post_list':
            $result = $this->get_post_list();
            break;
            
            case 'post':
            $result = $this->get_post();
            break;
            
            case 'sidebars':
            $result = $this->get_sidebars();
            break;
            
            case 'footer':
            $result = $this->get_footer();
            break;
        }

        return $result;
    }

    public function get_color($group, $meta){
        $result = $this->get_group($group);
        if(!isset($result['colors'][$meta])){
            dd($meta);
            dd($result);
            wp_die();
        }
        return $result['colors'][$meta];
    }

    public function get_font($group, $meta){
        $result = $this->get_group($group);

        return $result['fonts'][$meta];
    }

    public function get_display($group, $meta){
        $result = $this->get_group($group);

        return $result['display'][$meta];
    }

    public function get_shape($group, $meta){
        $result = $this->get_group($group);

        return $result['shape'][$meta];
    }

    private function set_site_identity($site_identity){
       $this->site_identity = $this->sanitize_arg($this->site_identity, $site_identity);
    }

    public function get_site_identity(){
        return $this->site_identity;
     }
    
    private function set_header($header){
        $this->header = $this->sanitize_arg($this->header, $header);
    }

    public function get_header(){
        return $this->header;
    }

    private function set_primary_menu($primary_menu){
        $this->primary_menu = $this->sanitize_arg($this->primary_menu, $primary_menu);
    }

    public function get_primary_menu(){
        return $this->primary_menu;
    }
    
    private function set_home($home){
        $this->home = $this->sanitize_arg($this->home, $home);
    }

    public function get_home(){
        return $this->home;
    }

    private function set_post_list($post_list){
        $this->post_list = $this->sanitize_arg($this->post_list, $post_list);
    }

    public function get_post_list(){
        return $this->post_list;
    }

    private function set_post($post){
        $this->post = $this->sanitize_arg($this->post, $post);
    }

    public function get_post(){
        return $this->post;
    }

    private function set_sidebars($sidebars){
        $this->sidebars = $this->sanitize_arg($this->sidebars, $sidebars);
    }

    public function get_sidebars(){
        return $this->sidebars;
    }

    private function set_footer($footer){
        $this->footer = $this->sanitize_arg($this->footer, $footer);
    }

    public function get_footer(){
        return $this->footer;
    }

    private function sanitize_arg($prop, $arg){
        if(is_array($arg) && count($arg) > 0){
            if(isset($arg['colors']) && count($arg['colors']) > 0){
                foreach($prop['colors'] as $key => $value){
                    if(isset($arg['colors'][$key])){
                        $prop['colors'][$key] = $arg['colors'][$key];
                    }
                }
            }
            if(isset($arg['fonts']) && count($arg['fonts']) > 0){
                foreach($prop['fonts'] as $key => $value){
                    if(isset($arg['fonts'][$key])){
                        $prop['fonts'][$key] = $arg['fonts'][$key];
                    }
                }
            }
            if(isset($arg['display']) && count($arg['display']) > 0){
                foreach($prop['display'] as $key => $value){
                    if(isset($arg['display'][$key])){
                        $prop['display'][$key] = $arg['display'][$key];
                    }
                }
            }
            if(isset($arg['shape']) && count($arg['shape']) > 0){
                foreach($prop['shape'] as $key => $value){
                    if(isset($arg['shape'][$key])){
                        $prop['shape'][$key] = $arg['shape'][$key];
                    }
                }
            }

            return $prop;
        }else{
            return false;
        }
    }
}