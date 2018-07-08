<?php
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Google_Fonts;

$group = 'coeus-customizer-post-list-button-more';

$values = array(
    'button_more_display' => get_option('coeus_post_list_button_more_display'),
    'button_more_bg_color' => get_option('coeus_post_list_button_more_bg_color'),
    'button_more_color' => get_option('coeus_post_list_button_more_color'),
    'button_more_font' => Google_Fonts::get_option('coeus_post_list_button_more_font'),
    'button_more_text' => get_option('coeus_post_list_button_more_text')
);

$button_more_display_checked = $values['button_more_display'] ? 'checked="checked"' : '';

wp_enqueue_media();
?>

<div class="button-more">
    <h3> Read More Button</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $group ); ?>
        <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="coeus_post_list_button_more_display">Display</label>
                </div>
                <div class="field-wrapper">
                    <input id="coeus_post_list_button_more_display" type="checkbox" name="coeus_post_list_button_more_display" value="true" <?php
                        echo $button_more_display_checked ?> >
                </div>
            </div>

            <div class="coeus-field-group">
                <?php
                    $name = 'coeus_post_list_button_more_bg_color';
                    $value = $values['button_more_bg_color'];
                    $id = 'buttom_more_bg_color';
                    $label = "Background Color";
                    echo Advanced_Field::spectrum($name,$value,$id,$label);
                ?>
            </div>

            <div class="coeus-field-group">
                <?php
                    $name = 'coeus_post_list_button_more_color';
                    $value = $values['button_more_color'];
                    $label = "Text Color";

                    echo Advanced_Field::spectrum($name,$value,$id,$label);
                ?>
            </div>

            <div class="coeus-field-group">
                <?php echo Advanced_Field::font(array(
                        'name' => 'coeus_post_list_button_more_font',
                        'value' => $values['button_more_font'] ,
                        'label' => 'Font'
                    ));?>
            </div>

            <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="button_more_text">Text</label>
                </div>
                <div class="field-wrapper">
                    <input id="button_more_text" type="text" name="coeus_post_list_button_more_text" value="<?php echo $values['button_more_text']; ?>">
                </div>
            </div>

            <?php submit_button(); ?>
    </form>
</div>