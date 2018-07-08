<?php
use _8webit\wp_stem\Renderer\Advanced_Field;

$post_list  = 'coeus-customizer-post-list-layout';

$post_list_values = array(
    'posts_per_page' => get_option('coeus_post_list_posts_per_page',10),
    'container' => get_option('coeus_post_list_container', 'fluid-fixed'),
	'layout' => get_option('coeus_post_list_layout', 'alfa'),
    'column' => get_option('coeus_post_list_column', 2),
    'column_type' => get_option('coeus_post_list_column_type', 'equal')
);

$container = get_checked_field( $post_list_values['container'], array('fixed','fluid'));

$layout = get_checked_field( $post_list_values['layout'], array('alfa', 'beta', 'delta', 'gamma') );

$column = get_checked_field( $post_list_values['column'], array(1,2,3,4));
$column_type = get_checked_field( $post_list_values['column_type'], array('non-equal','equal'));

?>
<div id="post-list-layout">
    <h3> Layout</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $post_list ); ?>
        
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="posts_per_page">Posts per page</label>
            </div>
            <div class="field-wrapper">
                <input id="posts_per_page"
                        type="number"
                        name="coeus_post_list_posts_per_page"
                        value="<?php echo $post_list_values['posts_per_page']; ?>">
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="">Container</label>
            </div>
            <div class="field-wrapper">
                <label class="block">
                    <input type="radio" name="coeus_post_list_container"
                        value="fixed" <?php echo $container['fixed']; ?> >
                    Constrained(Fixed)
                </label>
                <label class="block">
                    <input type="radio" name="coeus_post_list_container"
                        value="fluid" <?php echo $container['fluid']; ?> >
                    Full Width(Fluid)
                </label>
            </div>
        </div>

        <div class="coeus-field-group layout-selector">
            <div class="label-wrapper">
                <label>Post Layout</label>
            </div>
            <div class="field-wrapper">
                <label>
                    <input type="radio" name="coeus_post_list_layout"
                        value="alfa" <?php echo $layout['alfa']; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_list_alfa.png'; ?>">
                </label>
                
                <label>
                <input type="radio" name="coeus_post_list_layout"
                        value="beta" <?php echo $layout['beta']; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_list_beta.png'; ?>">
                </label>
                
                <label>
                <input type="radio" name="coeus_post_list_layout"
                        value="delta" <?php echo $layout['delta']; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_list_delta.png'; ?>">
                </label>
                
                <label>
                <input type="radio" name="coeus_post_list_layout"
                        value="gamma" <?php echo $layout['gamma']; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_list_gamma.png'; ?>">
                </label>
            </div>
        </div>

        <div class="coeus-field-group layout-selector">
            <div class="label-wrapper">
                <label for="post_list_column">Column</label>
            </div>
            <div class="field-wrapper ">
                <label>
                    <input type="radio" name="coeus_post_list_column"
                            value="1" <?php echo $column[1]; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/post_list_column_1.png'; ?>">
                </label>
                <label>
                    <input type="radio" name="coeus_post_list_column"
                            value="2" <?php echo $column[2]; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/post_list_column_2.png'; ?>">
                </label>
                <label>
                    <input type="radio" name="coeus_post_list_column"
                            value="3" <?php echo $column[3]; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/post_list_column_3.png'; ?>">
                </label>
                <label>
                    <input type="radio" name="coeus_post_list_column"
                            value="4" <?php echo $column[4]; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/post_list_column_4.png'; ?>">
                </label>
            </div>
        </div>

        <div class="coeus-field-group layout-selector">
            <div class="label-wrapper">
                <label for="post_list_column">Column Type</label>
            </div>
            <div class="field-wrapper ">
                <label>
                    <input type="radio" name="coeus_post_list_column_type"
                            value="equal" <?php echo $column_type['equal']; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_list_column_type_equal.png'; ?>">
                </label>
                <label>
                    <input type="radio" name="coeus_post_list_column_type"
                            value="non-equal" <?php echo $column_type['non-equal']; ?> >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/layouts/post_list_column_type_non_equal.png'; ?>">
                </label>
            </div>
        </div>

        <?php submit_button(); ?>
    </form>
</div>