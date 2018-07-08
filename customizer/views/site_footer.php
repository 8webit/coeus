<?php
use _8webit\wp_stem\Renderer\Advanced_Field;

$group = 'coeus-customizer-footer';

$values = array(
    'display' => get_option('coeus_customizer_footer_display'),
    'layout' => get_option('coeus_customizer_footer_layout'),
    'bg_color' => get_option('coeus_customizer_footer_bg_color'),
    'text_color' => get_option('coeus_customizer_footer_text_color'),
    'copyright_text' => get_option('coeus_customizer_footer_copyright_text'),
    'social_link_display' => get_option('coeus_customizer_footer_social_link_display'),
);
$layout = get_checked_field( $values['layout'], array('fluid', 'fixed') );
$footer_display = !empty($values['display']) ? 'checked=checked' : ''; 
$social_link_display = !empty($values['social_link_display']) ? 'checked=checked' : '';
?>

<div id="footer-layout">
    <h3> Footer </h3>
    <form method="post" action="options.php">
        <?php settings_fields( $group ); ?>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="display_footer">Display Footer</label>
            </div>
            <div class="field-wrapper">
                <input id="display_footer" type="checkbox" name="coeus_customizer_footer_display" value="true" <?php echo $footer_display; ?>>
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label> Header Layout : </label>
            </div>
            <div class="field-wrapper">
                <label class="block">
                    <input type="radio" name="coeus_customizer_footer_layout"
                           value="fluid" <?php echo $layout['fluid']; ?> >
                    Fluid(full width)
                </label>
                <label class="block">
                    <input type="radio" name="coeus_customizer_footer_layout"
                           value="fixed" <?php echo  $layout['fixed']; ?> >Fixed
                    Width
                </label>
            </div>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_customizer_footer_bg_color', 
                                                        $values['bg_color'],
                                                        '',
                                                        'Background Color'); ?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_customizer_footer_text_color', 
                                                        $values['text_color'],
                                                        '',
                                                        'Text Color'); ?>
        </div>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="copyright_text">Copyright Text</label>
            </div>
            <div class="field-wrapper">
                <input id="copyright_text" type="text" name="coeus_customizer_footer_copyright_text" value="<?php echo $values['copyright_text'] ; ?>">
            </div>
        </div>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="display_social_link">Display Social Links</label>
            </div>
            <div class="field-wrapper">
                <input id="display_social_link" type="checkbox" name="coeus_customizer_footer_social_link_display" value="true" <?php echo $social_link_display; ?>>
            </div>
        </div>
        <?php submit_button(); ?>
    </form>
</div>
