<?php
function coues_rest_get_menu_locations(){    
   return array("data" => get_nav_menu_locations());
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'coeus/v1', '/menus', array(
    'methods' => 'GET',
    'callback' => 'coues_rest_get_menu_locations',
  ));
});


function coues_rest_get_menu_item($data){
    $result = '';
    $locations = get_nav_menu_locations();
    $slug = $data['slug'];
    $args = array(
        'hierarchical' => 1,
        'post_status' => 'publish'
    ); 
    
    if(isset($locations[$slug])){
        $menu_items = wp_get_nav_menu_items($locations[$slug],$args);

        if($menu_items){
            $id_column = array_column($menu_items,'ID');

            foreach($menu_items as $key=> $menu_item){
              // add menu slug
              $menu_item->{'slug'} = basename(str_replace(get_site_url(),"",$menu_item->url));
              
              // finds menu item parents and becomes its childen
              if($menu_item->menu_item_parent){
                $parent = array_search($menu_item->menu_item_parent,$id_column);
                
                if(!$parent){
                  continue;
                }

                if(!isset($menu_items[$parent]->{'childrens'})){
                  $menu_items[$parent]->{'childrens'} = [$menu_item];
                }else{
                  $arr = $menu_items[$parent]->{'childrens'};
                  $arr = is_array($arr) ?  $arr : [$arr];
                  $arr[] = $menu_item;
                  $menu_items[$parent]->{'childrens'} = $arr;
                }
                unset($menu_items[$key]);
              }
            }
        }

        $result = !empty($menu_items) ? $menu_items : '';
    }else{
        $result= 404;
    }

    return array("data" => $result);
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'coeus/v1', '/menus/(?P<slug>[a-zA-Z0-9-]+)', array(
    'methods' => 'GET',
    'callback' => 'coues_rest_get_menu_item',
  ));
});