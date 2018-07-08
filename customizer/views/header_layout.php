<?php
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Renderer\Field_Renderer;

$header_layout = 'coeus-customizer-header-layout';

$values = array(
    'layout'              => get_option( 'coeus_header_layout', 'fluid_fixed'),
    'bg'                  => get_option( 'coeus_header_bg' , '#000'),
    'search_show'         => get_option( 'coeus_header_search_display' ),
);

$layout = get_checked_field( $values['layout'], array('fluid', 'fixed', 'fluid_fixed') );

$is_search_checked = $values['search_show'] == 'display' ? 'checked' : '';
?>

<div id="header-layout">
    <h3> Header Layout </h3>
    <form method="post" action="options.php">
		<?php settings_fields( $header_layout ); ?>
        <div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_header_bg', $values['bg'], '', 'Background Color' ); ?>
        </div>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label> Header Layout : </label>
            </div>
            <div class="field-wrapper">
                <label class="block">
                    <input type="radio" name="coeus_header_layout"
                           value="fluid" <?php echo $layout['fluid']; ?> >
                    Fluid(full width)
                </label>
                <label class="block">
                    <input type="radio" name="coeus_header_layout"
                           value="fixed" <?php echo  $layout['fixed']; ?> >Fixed
                    Width
                </label>
                <label class="block">
                    <input type="radio" name="coeus_header_layout"
                           value="fluid_fixed" <?php echo $layout['fluid_fixed']; ?> >Background
                    fluid width,but navigation fixed width
                </label>
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="#coeus_header_search_display">Display Search</label>
            </div>

            <div class="field-wrapper">
                <input type="checkbox" name="coeus_header_search_display" value="display" <?php echo $is_search_checked; ?>>
            </div>
        </div>

		<?php submit_button(); ?>
    </form>
</div>


