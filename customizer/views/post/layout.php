<?php
$post = 'coeus-customizer-post-layout';

$post_values = array(
    'container' => get_option('coeus_post_container', 'fixed'),
    'layout' => get_option('coeus_post_layout', 'alfa')
);

$container = get_checked_field( $post_values['container'], array('fixed','fluid'));

$layout = get_checked_field( $post_values['layout'] , array('alfa', 'beta', 'delta', 'epsilon', 'gamma') );
?>

<div id="post-layout">
    <h3> Layout </h3>
    <form method="post" action="options.php">
    <?php settings_fields( $post ); ?>
        
    <div class="coeus-field-group">
        <div class="label-wrapper">
            <label for="">Container</label>
        </div>
        <div class="field-wrapper">
            <label class="block">
                <input type="radio" name="coeus_post_container"
                    value="fixed" <?php echo $container['fixed']; ?> >
                Constrained(Fixed)
            </label>
            <label class="block">
                <input type="radio" name="coeus_post_container"
                    value="fluid" <?php echo $container['fluid']; ?> >
                Full Width(Fluid)
            </label>
        </div>
    </div>

    <div class="coeus-field-group layout-selector large">
        <div class="label-wrapper">
            <label for="layout">Layout</label>
        </div>
        <div class="field-wrapper">
            <label>
                <input type="radio" name="coeus_post_layout"
                    value="alfa" <?php echo $layout['alfa']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_alfa.png'; ?>">
            </label>
            
            <label>
                <input type="radio" name="coeus_post_layout"
                    value="beta" <?php echo $layout['beta']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_beta.png'; ?>">
            </label>
            <label>
                <input type="radio" name="coeus_post_layout"
                    value="delta" <?php echo $layout['delta']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_delta.png'; ?>">
            </label>
            <label>
                <input type="radio" name="coeus_post_layout"
                    value="epsilon" <?php echo $layout['epsilon']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_epsilon.png'; ?>">
            </label>
            <label>
                <input type="radio" name="coeus_post_layout"
                    value="gamma" <?php echo $layout['gamma']; ?> >
                <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_gamma.png'; ?>">
            </label>
        </div>
    </div>

    <?php submit_button(); ?>
    </form>
</div>