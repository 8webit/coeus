jQuery(function ($) {
    "use strict";
    $(document).ready(function(){
        $('.spectrum').spectrum({
            preferredFormat: 'hex',
            showInput: true,
            allowEmpty:true,
            showAlpha: true
        });
        
        if (jQuery.ui) {
            // Sidebar Drag & Drop Customzer.Used In Theme Sidebar Settings
            $('.coeus_sidebar').each(function () {
                var left_values = {};
                var right_values = {};
                var id = $(this).attr('id');

                left_values[id] = left_values[id] == undefined ? [] : left_values[id];
                right_values[id] = right_values[id] == undefined ? [] : right_values[id];
                

                $(this).find('.coeus_sidebar-box-left input')
                        .each(function(event){
                            left_values[id].push($(this).val());
                        });
                
                $(this).find('.coeus_sidebar-box-right input')
                .each(function(event){
                    right_values[id].push($(this).val());
                });

                update_values($(this), id);
                
                $(this).find('.available-items').sortable({
                    items: '> .available-item',                    
                    connectWith: $(this).find('.coeus_sidebar-box-content'),
                    placeholder: 'box-placeholder',
                    containment: $(this),
                    opacity: 0.8,
                    revert: 200,
                    delay: 50,
                    receive: function(event, ui){
                        var id = ui.item.parents('.coeus_sidebar').first().attr('id');

                        if(ui.sender.hasClass('coeus_sidebar-box-left')){
                            var index = left_values[id].indexOf(ui.item.find('input').val());
                            left_values[id].splice(index, 1);
                        }else if(ui.sender.hasClass('coeus_sidebar-box-right')){
                            var index = right_values[id].indexOf(ui.item.find('input').val());
                            right_values[id].splice(index, 1);
                        }
                    }
                });

                $(this).find('.coeus_sidebar-box-content').sortable({
                    connectWith: $(this).find('.available-items, .coeus_sidebar-box-content'),
                    placeholder: 'box-placeholder',
                    containment: $(this),
                    opacity: 0.8,
                    revert: 200,
                    delay: 50,
                    receive: function(event, ui){
                        sort(event, ui);
                    },
                    stop: function(event, ui){
                        sort(event, ui)
                    },
                    remove: function(event, ui){
                        remove(event, ui)
                    }
                });

                function sort(event, ui){
                    var id = ui.item.parents('.coeus_sidebar').first().attr('id');
                    var value =  ui.item.find('input').first().val();

                    store_values(ui, id, ui.item.index(), value);
                    
                    ui.item.siblings().each(function(){
                        store_values(ui, id, $(this).index(), $(this).find('input').first().val());
                    });
                    
                    update_values(ui.item.parents('.coeus_sidebar').first(), id);
               }

               function remove(event, ui){
                    var id = ui.item.parents('.coeus_sidebar').first().attr('id');

                    if(ui.item.parents('.coeus_sidebar-box-left').length){
                        var index = right_values[id].indexOf(ui.item.find('input').val());
                        right_values[id].splice(index, 1);
                    }else if(ui.item.parents('.coeus_sidebar-box-right').length){
                        var index = left_values[id].indexOf(ui.item.find('input').val());
                        left_values[id].splice(index, 1);
                    }

                    update_values(ui.item.parents('.coeus_sidebar').first(),id);
               }

               function update_values($sidebar, id){
                   $sidebar.first()
                       .find('input[name="sidebar_' + id + '_left"]')
                       .val(JSON.stringify(left_values[id]));
   
                   $sidebar.first()
                       .find('input[name="sidebar_' + id + '_right"]')
                       .val(JSON.stringify(right_values[id]));
               }

               function store_values(ui, id, index, value){
                    if(ui.item.parents('.coeus_sidebar-box-left').length){
                        left_values[id][index] = value;
                    }else if(ui.item.parents('.coeus_sidebar-box-right').length){
                        right_values[id][index] = value;   
                    }
               }
            });

            
        }
        
    });
 
    $(document).ready(function () {
        // Make menu active by current url 
        function set_menu_active(){
          var menuItems = $('.coeus-settings-menu-item');    
          
          if(menuItems){
            for(var i=0; i < menuItems.length; i++){
              if(menuItems[i].getAttribute('href') === window.location.href){
                menuItems[i].classList.add('active');
                $(menuItems[i]).parent()
                    .show()
                    .siblings('.coeus-dropdown-title')
                    .addClass('active')
                    .find('.dashicons-arrow-down')
                    .addClass('dashicons-arrow-up')
                    .removeClass('dashicons-arrow-down');
                break;
              }
            }
          }
        }
    
        set_menu_active();    
    });


    // Layout Selector 
    $(document).ready(function () {
        function set_layout_active(){
            $('.layout-selector img').on('click',function(){
                $(this).parents('.layout-selector')
                    .first()
                    .find('img.active')
                    .removeClass('active');

                $(this).addClass('active');
            });

            $('.layout-selector input:checked').siblings('img')
                .addClass('active');
        }

        set_layout_active();
    });

    $(document).ready(function(){
        $('.coeus-dropdown-title').on('click', function(){
            $(this).siblings('.coeus-dropdown-childrens')
                .toggle(200,function(){
                    var dashicons = $(this).siblings('.coeus-dropdown-title').find('.dashicons');

                    if(dashicons.hasClass('dashicons-arrow-up')){
                        dashicons.removeClass('dashicons-arrow-up')
                            .addClass('dashicons-arrow-down');
                    }else{
                        dashicons.removeClass('dashicons-arrow-down')
                        .addClass('dashicons-arrow-up');
                    }
                });
        });
    });

    $(document).ready(function(){
        $('.coeus-datapicker').each(function(){
            $(this).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'mm/dd/yy'
            }).datepicker('widget').wrap('<div class="coeus-datapicker"/>');
        })
    });
});
