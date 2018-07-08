<?php
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Meta;
use _8webit\wp_stem\Google_Fonts;

wp_enqueue_media();

$site_identity = 'coeus-customizer-site-identity';

$values = array(
	'body_bg_color' => get_option('coeus_body_background_color'),
	'title'       => Meta::mirror_option( 'blogname', 'coeus_brand_blogname' ),
	'title_font' => Google_Fonts::get_option( 'coeus_brand_title_font' ),
	'title_color' => get_option( 'coeus_brand_title_color' ),
	'logo'        => get_option( 'coeus_brand_logo' ),
	'only_logo'   => get_option( 'coeus_brand_display_only_logo' ),
	'primary_color' => get_option('coeus_primary_color'),
	'text_color' => get_option('coeus_text_color'),
	'meta_color' => get_option('coeus_meta_color'),
	'primary_font' => Google_Fonts::get_option('coeus_primary_font'),
	'text_font' => Google_Fonts::get_option('coeus_text_font'),
	'meta_font' => Google_Fonts::get_option('coeus_meta_font')
);
?>

<div id="site-identity">
	<h3> Site Identity </h3>
	<form method="post" action="options.php">
		<?php settings_fields( $site_identity ); ?>
		
		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum('coeus_body_background_color',
														$values['body_bg_color'],
														'',
														'Body background color'); ?>
		</div>

		<div class="coeus-field-group">
			<div class="label-wrapper">
				<label for="coeus_brand_blogname"> Site Title </label>
			</div>
			<div class="field-wrapper">
				<input id="coeus_brand_blogname" type="text" name="coeus_brand_blogname"
				       value="<?php echo $values['title'] ?>"/>
			</div>
		</div>

		<div class="coeus-field-group">
			<?php echo Advanced_Field::font(array(
														'value' => $values['title_font'],
														'name' => 'coeus_brand_title_font',
														'label' => 'Title Font'
														));?>
		</div>

		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_brand_title_color', $values['title_color'], '', 'Site Title Color' ); ?>
		</div>

		<div class="coeus-field-group">
			<?php echo Advanced_Field::wp_media( 'coeus_brand_logo', $values['logo'], 'Logo', 'Upload Logo', 'Remove Logo', false ); ?>
		</div>

		<div class="coeus-field-group">
			<div class="label-wrapper">
				<label for="coeus_brand_display_only_logo"> Display Only Logo </label>
			</div>
			<div class="field-wrapper">
				<input id="coeus_brand_display_only_logo" type="checkbox" name="coeus_brand_display_only_logo"
				       value="only_logo" <?php echo $values['only_logo'] == 'only_logo' ? 'checked' : ''; ?>>
			</div>
		</div>

		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_primary_color', $values['primary_color'], '', 'Primary Color' ); ?>
		</div>
		<div class="coeus-field-group">
			<?php echo Advanced_Field::font(array(
														'value' => $values['primary_font'],
														'name' => 'coeus_primary_font',
														'label' => 'Primary Font'
														));?>
		</div>
		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_text_color', $values['text_color'], '', 'Text Color' ); ?>
		</div>
		<div class="coeus-field-group">
			<?php echo Advanced_Field::font(array(
														'value' => $values['text_font'],
														'name' => 'coeus_text_font',
														'label' => 'Text Font'
														));?>
		</div>
		<div class="coeus-field-group">
			<?php echo Advanced_Field::spectrum( 'coeus_meta_color', $values['meta_color'], '', 'Meta Color' ); ?>
		</div>
		<div class="coeus-field-group">
            <?php echo Advanced_Field::font(array(
                                                        'value' => $values['meta_font'],
                                                        'name' => 'coeus_meta_font',
                                                        'label' => 'Meta Font'
                                                        ));?>
        </div>
		<?php submit_button(); ?>
	</form>
</div>

