<h1><img class="coeus-menu-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/coeus_logo.png" >Coeus Customizer</h1>

<div class="coeus-settings-menu">
    <a href="<?php menu_page_url('coeus_customizer',true); ?>" class="coeus-settings-menu-item"> Site Identity </a>
    <a href="<?php menu_page_url('coeus_customizer_header_layout',true); ?>" class="coeus-settings-menu-item"> Header</a>
    <a href="<?php menu_page_url('coeus_customizer_primary_menu',true); ?>" class="coeus-settings-menu-item"> Primary Menu </a>
    
    <div class="coeus-dropdown">
        <a href="javascript:void(0);" class="coeus-dropdown-title coeus-settings-menu-item">
            Home<span class="dashicons dashicons-arrow-down"></span>
        </a>
        <div class="coeus-dropdown-childrens">
            <a href="<?php menu_page_url('coeus_customizer_home_layout',true); ?>" class="coeus-settings-menu-item"> Layout </a>
            <a href="<?php menu_page_url('coeus_customizer_home_modify_layout',true); ?>" class="coeus-settings-menu-item"> Modify Layout </a>
        </div>
    </div>
    
    <div class="coeus-dropdown">
        <a href="javascript:void(0);" class="coeus-dropdown-title coeus-settings-menu-item">
            Post List <span class="dashicons dashicons-arrow-down"></span>
        </a>
        <div class="coeus-dropdown-childrens">
            <a href="<?php menu_page_url('coeus_customizer_post_list_layout',true); ?>" class="coeus-settings-menu-item"> Layout </a>
            <a href="<?php menu_page_url('coeus_customizer_post_list_modify_layout',true); ?>" class="coeus-settings-menu-item"> Modify Layout</a>
            <a href="<?php menu_page_url('coeus_customizer_post_list_sidebar',true); ?>" class="coeus-settings-menu-item"> Sidebar </a>
            <a href="<?php menu_page_url('coeus_customizer_post_list_button_more',true); ?>" class="coeus-settings-menu-item"> Read More Button</a>
            <a href="<?php menu_page_url('coeus_customizer_post_list_pagination',true); ?>" class="coeus-settings-menu-item"> Pagination</a>
        </div>
    </div>

    <div class="coeus-dropdown">
        <a href="javascript:void(0);" class="coeus-dropdown-title coeus-settings-menu-item">
            Post<span class="dashicons dashicons-arrow-down"></span>
        </a>
        <div class="coeus-dropdown-childrens">
            <a href="<?php menu_page_url('coeus_customizer_post_layout',true); ?>" class="coeus-settings-menu-item"> Layout </a>
            <a href="<?php menu_page_url('coeus_customizer_post_modify_layout',true); ?>" class="coeus-settings-menu-item"> Modify Layout</a>
            <a href="<?php menu_page_url('coeus_customizer_post_sidebar',true); ?>" class="coeus-settings-menu-item"> Sidebar </a>
        </div>
    </div>
    
    <div class="coeus-dropdown">
        <a href="javascript:void(0);" class="coeus-dropdown-title coeus-settings-menu-item">
            Sidebar <span class="dashicons dashicons-arrow-down"></span>
        </a>
        <div class="coeus-dropdown-childrens">
            <a href="<?php menu_page_url('coeus_customizer_sidebar_categories',true); ?>" class="coeus-settings-menu-item"> Categories </a>
            <a href="<?php menu_page_url('coeus_customizer_sidebar_recent_post',true); ?>" class="coeus-settings-menu-item"> Latest Post </a>
            <a href="<?php menu_page_url('coeus_customizer_sidebar_author',true); ?>" class="coeus-settings-menu-item"> Author </a>
            <a href="<?php menu_page_url('coeus_customizer_ad',true); ?>" class="coeus-settings-menu-item"> Advertisment </a>
        </div>
    </div>
    
    <a href="<?php menu_page_url('coeus_customizer_footer',true); ?>" class="coeus-settings-menu-item"> Footer </a>
    <a href="<?php menu_page_url('coeus_customizer_social',true); ?>" class="coeus-settings-menu-item"> Social </a>
</div>