<?php 
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Google_Fonts;

$group = 'coeus-customizer-home-modify-layout';

$values = array(
    'title_font' => Google_Fonts::get_option('coeus_home_modify_layout_title_font'),
    'title_text_color' => get_option('coeus_home_modify_layout_title_text_color'),
    'excerpt_font' => Google_Fonts::get_option('coeus_home_modify_layout_excerpt_font'),
    'excerpt_color' => get_option('coeus_home_modify_layout_excerpt_color'),
    'meta_font' => Google_Fonts::get_option('coeus_home_modify_layout_meta_font'),
    'meta_color' => get_option('coeus_home_modify_layout_meta_color')
);
?>
<div id="modify_layout">
    <h3> Modify Layout </h3>
    <form method="post" action="options.php">
        <?php settings_fields( $group ); ?>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::font(array(
                                                        'value' => $values['title_font'],
                                                        'name' => 'coeus_home_modify_layout_title_font',
                                                        'label' => 'Title Font'
                                                        ));?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_home_modify_layout_title_text_color',
                                                        $values['title_text_color'],
                                                        '',
                                                        'Title Color'); ?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::font(array(
                                                        'value' => $values['excerpt_font'],
                                                        'name' => 'coeus_home_modify_layout_excerpt_font',
                                                        'label' => 'Excerpt Font'
                                                        ));?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_home_modify_layout_excerpt_color',
                                                        $values['excerpt_color'],
                                                        '',
                                                        'Excerpt Color'); ?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::font(array(
                                                        'value' => $values['meta_font'],
                                                        'name' => 'coeus_home_modify_layout_meta_font',
                                                        'label' => 'Meta Font'
                                                        ));?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_home_modify_layout_meta_color',
                                                        $values['meta_color'],
                                                        '',
                                                        'Meta Color'); ?>
        </div>
        <?php submit_button(); ?>
    </form>
</div>