<?php
$group = 'coeus-customizer-home';

$post_values = array(
    'layout' => get_option('coeus_home_layout', 'alfa')
);

$layout = get_checked_field( $post_values['layout'] , array('alfa','beta') );
?>

<div id="home-layout">
    <h3> Layout </h3>
    <form method="post" action="options.php">
    <?php settings_fields( $group ); ?>

    <div class="coeus-field-group layout-selector large">
        <div class="label-wrapper">
            <label for="layout">Layout</label>
        </div>
        <div class="field-wrapper">
            <label>
                <input type="radio" name="coeus_home_layout"
                    value="alfa" <?php echo $layout['alfa']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/home_alfa.png'; ?>">
            </label>
            <label>
                <input type="radio" name="coeus_home_layout"
                    value="beta" <?php echo $layout['beta']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/home_beta.png'; ?>">
            </label>
        </div>
    </div>

    <?php submit_button(); ?>
    </form>
</div>