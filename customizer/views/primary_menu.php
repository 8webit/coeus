<?php
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Renderer\Field_Renderer;
use _8webit\wp_stem\Google_Fonts;

$primary_menu  = 'coeus-customizer-primary-menu';

$values = array(
	'text_color'       => get_option( 'coeus_primary_nav_text_color' , '#FFF'),
	'font'       => Google_Fonts::get_option( 'coeus_primary_nav_font'),
	'bg_hover'         => get_option( 'coeus_primary_nav_bg_hover' , '#FFF'),
	'text_color_hover' => get_option( 'coeus_primary_nav_text_color_hover', '#000' ),
);
?>


<div id="primary-menu">
	<h3> Primary Menu </h3>
	<form method="post" action="options.php">
		<?php settings_fields( $primary_menu ); ?>

		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_primary_nav_text_color', $values['text_color'], '', 'Menu Item  Text Color' ); ?>
		</div>
		<div class="coeus-field-group">
			<?php echo Advanced_Field::font(array(
														'value' => $values['font'],
														'name' => 'coeus_primary_nav_font',
														'label' => 'Font'
														));?>
		</div>


		<hr>
        <h4> Menu Item ON HOVER </h4>
		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_primary_nav_bg_hover', $values['bg_hover'], '', 'Background Color' ); ?>
		</div>

		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_primary_nav_text_color_hover', $values['text_color_hover'], '', 'Text Color' ); ?>
		</div>

		<?php submit_button(); ?>
	</form>
</div>