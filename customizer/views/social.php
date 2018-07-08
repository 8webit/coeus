<?php

$social = 'coeus-customizer-social';

$social_values = array(
	'fb_app_id'		 => get_option('coeus_social_fb_app_id'),
	'fb_link'        => get_option( 'coeus_social_fb_link' ),
	'twitter_link'   => get_option( 'coeus_social_twitter_link' ),
	'google_link'    => get_option( 'coeus_social_google_plus_link' )
);

?>
<div id="social">
	<h3> Social Links</h3>
	<form method="post" action="options.php">
		<?php settings_fields( $social ); ?>

		<div class="coeus-field-group">
			<div class="label-wrapper">
				<label for="social_fb_link">Facebook APP ID</label>
			</div>
			<div class="field-wrapper">
				<input id="social_fb_link" type="number" name="coeus_social_fb_app_id"
				       value="<?php echo $social_values['fb_app_id']; ?>">
			</div>
		</div>
		<div class="coeus-field-group">
			<div class="label-wrapper">
				<label for="social_fb_link">Facebook Page Link</label>
			</div>
			<div class="field-wrapper">
				<input id="social_fb_link" type="url" name="coeus_social_fb_link"
				       value="<?php echo $social_values['fb_link']; ?>">
			</div>
		</div>

		<div class="coeus-field-group">
			<div class="label-wrapper">
				<label for="social_twitter_link">Twitter Page Link</label>
			</div>
			<div class="field-wrapper">
				<input id="social_twitter_link" type="url" name="coeus_social_twitter_link"
				       value="<?php echo $social_values['twitter_link']; ?>">
			</div>
		</div>

		<div class="coeus-field-group">
			<div class="label-wrapper">
				<label for="social_google_link">Google Plus Page Link</label>
			</div>
			<div class="field-wrapper">
				<input id="social_google_link" type="url" name="coeus_social_google_plus_link"
				       value="<?php echo $social_values['google_link']; ?>">
			</div>
		</div>
		<?php submit_button(); ?>
	</form>
</div>
