<?php
function sanitize_Int($value){
    return filter_var($value,FILTER_SANITIZE_NUMBER_INT);
}

function get_checked_field($current_value, $available_values){
    $result = array();

    foreach($available_values as $value){
        $result[$value] = $current_value == $value ? 'checked="checked"' : '';
    }

    return $result;
}

function coeus_sidebar_customizer($id, $available_items = array(), $left_sidebar_items = array(), $right_sidebar_items = array()){
    $left_sidebar_items = is_array($left_sidebar_items) ? $left_sidebar_items : [];
    $right_sidebar_items = is_array($right_sidebar_items) ? $right_sidebar_items : [];

    $html = '<div id="' .$id. '" class="coeus_sidebar">';
    $html .= '<input type="hidden" name="sidebar_' .$id. '_left" value="" class="coeus_sidebar-field">';
    $html .= '<input type="hidden" name="sidebar_' .$id. '_right" value="" class="coeus_sidebar-field">';
    
    
    $html .= '<div class="available-items">';

    if(count($available_items) > 0 ){
        foreach($available_items as $value => $title){
            if((count($left_sidebar_items) && in_array($value,$left_sidebar_items))
                || (count($right_sidebar_items) &&  in_array($value,$right_sidebar_items))){
                continue;
            }
            $html .= coeus_sidebar_customizer_item($title, $value);
        }
    }
    
    $html   .= '</div>';

    $html .= '<div class="coeus_sidebar-box">';
    $html .= '<p class="title">Left Sidebar</p>';
    $html .= '<div class="coeus_sidebar-box-content coeus_sidebar-box-left">';
    
    if(count($left_sidebar_items) > 0){
        foreach($left_sidebar_items as $value){
            $html .= coeus_sidebar_customizer_item($available_items[$value], $value);
        }
    }
    
    $html .= '</div>';
    $html .= '</div>';

    $html .= '<div class="coeus_sidebar-box">';
    $html .= '<p class="title">Right Sidebar</p>';
    $html .= '<div class="coeus_sidebar-box-content coeus_sidebar-box-right">';
    if(count($right_sidebar_items) > 0){
        foreach($right_sidebar_items as $value){
            $html .= coeus_sidebar_customizer_item($available_items[$value], $value);
        }
    }

    $html .='</div>';
    $html .= '</div>';
    
    $html .= '</div>';

    return $html;
}

function coeus_sidebar_customizer_item($title, $value){
   $html =  '<div class="available-item">';
   $html .= '<p class="title"><span class="button-sortable dashicons dashicons-move"></span>'. $title. '</p>';
   $html .= '<input type="hidden" value="'. $value .'">';
   $html .= '</div>';

   return $html;
}