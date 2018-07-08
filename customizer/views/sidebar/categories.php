<?php
use _8webit\wp_stem\Renderer\Advanced_Field;

$sidebar_values = array(
    'categories_bg_color' => get_option('coeus_sidebar_categories_bg_color'),
    'categories_color' => get_option('coeus_sidebar_categories_color'),
    'categories_active_bg_color' => get_option('coeus_sidebar_categories_active_bg_color'),        
    'categories_active_color' => get_option('coeus_sidebar_categories_active_color')
);

$sidebar = 'coeus-customizer-sidebar-categories';

?>

<div>
<h3>Categories Sidebar Customizer</h3>
<form method="post" action="options.php">
<?php settings_fields( $sidebar ); ?>
    <div class="coeus-field-group">
        <?php echo Advanced_Field::spectrum('coeus_sidebar_categories_bg_color', 
                                                    $sidebar_values['categories_bg_color'],
                                                    '',
                                                    'Sidebar Background Color');?>
    </div>

    <div class="coeus-field-group">
        <?php echo Advanced_Field::spectrum('coeus_sidebar_categories_color', 
                                                    $sidebar_values['categories_color'],
                                                    '',
                                                    'Sidebar Text Color');?>
    </div>

    <div class="coeus-field-group">
        <?php echo Advanced_Field::spectrum('coeus_sidebar_categories_active_bg_color', 
                                                    $sidebar_values['categories_active_bg_color'],
                                                    '',
                                                    'Active Category Background Color');?>
    </div>

    <div class="coeus-field-group">
        <?php echo Advanced_Field::spectrum('coeus_sidebar_categories_active_color', 
                                                    $sidebar_values['categories_active_color'],
                                                    '',
                                                    'Active Category Text Color');?>
    </div>

    <?php submit_button(); ?>
</form>
</div>