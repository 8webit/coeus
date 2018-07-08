<?php
use _8webit\wp_stem\Renderer\Advanced_Field;


$ad = 'coeus-customizer-sidebar-ad';

$ad_values = [
    'adsense_client_id' => get_option('coeus_ad_adsense_client_id'),
    'adsense_query' => get_option('coeus_ad_adsense_query'),
    'adsense_enable' => get_option('coeus_ad_adsense_enable'),
    'media' => get_option('coeus_ad_media'),
    'ad_url' => get_option('coeus_ad_url'),
    'expiration_end' => get_option('coeus_ad_expiration_date')
];

$adsense_enabled = !empty($ad_values['adsense_enable']) ? 'checked="checked"' : '';

wp_enqueue_media();
?>
<div id="ad">
	<h3> Advertisment</h3>
	<form method="post" action="options.php">
        <?php settings_fields( $ad ); ?>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="adsense_client_id">Adsense Client ID</label>
            </div>
            <div class="field-wrapper">
                <input id="adsense_client_id" type="text" 
                name="coeus_ad_adsense_client_id" value="<?php echo $ad_values['adsense_client_id']; ?>">
            </div>
        </div>
        
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="adsense_query">Adsense Query</label>
            </div>
            <div class="field-wrapper">
                <input id="adsense_query" type="text" 
                name="coeus_ad_adsense_query" value="<?php echo $ad_values['adsense_query']; ?>">
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="adsenese_enable">Enable Adsense</label>
            </div>
            <div class="field-wrapper">
                <input id="adsenese_enable" type="checkbox" 
                name="coeus_ad_adsense_enable" value="true" <?php echo $adsense_enabled; ?>>
            </div>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::wp_media('coeus_ad_media',
                                                    $ad_values['media'],
                                                    'Media For Advertisment(200 x 600)' );?>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="ad_url">URL</label>
            </div>
            <div class="field-wrapper">
                <input id="ad_url" type="url" 
                name ="coeus_ad_url" value="<?php echo $ad_values['ad_url']; ?>">
            </div>
        </div>
       
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="ad_expiration_date">AD Expiration Date</label>
            </div>
            <div class="field-wrapper">
                <input id="ad_expiration_date" class="coeus-datapicker" type="text" 
                name ="coeus_ad_expiration_date" value="<?php echo $ad_values['expiration_end']; ?>">
            </div>
        </div>

		<?php submit_button(); ?>
	</form>
</div>
