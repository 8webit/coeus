<?php 
use _8webit\wp_stem\Renderer\Advanced_Field;

$group  = 'coeus-customizer-post-list-pagination';

$values = array(
    'pagination_shape' => get_option('coeus_post_list_pagination_shape'),
    'pagination_shape_bg_color' => get_option('coeus_post_list_pagination_shape_bg_color','#fff'),
    'pagination_text_color' => get_option('coeus_post_list_pagination_text_color','#fff'),
    'pagination_active_shape_bg_color' => get_option('coeus_post_list_pagination_active_shape_bg_color','#fff'),
    'pagination_active_text_color' => get_option('coeus_post_list_pagination_active_text_color','#fff'),
    'pagination_layout' => get_option('coeus_post_list_pagination_layout')
);

$pagination_shape = get_checked_field($values['pagination_shape'], array('circle', 'square', 'none'));

$pagination_layout = get_checked_field($values['pagination_layout'], array('buttons', 'numbers', 'both'));

?>
<div id="header-layout">
    <h3> Pagination </h3>
    <form method="post" action="options.php">
		<?php settings_fields( $group ); ?>
            <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="">Shape</label>
            </div>
            <div class="field-wrapper">
                <label class="block">
                    <input type="radio" name="coeus_post_list_pagination_shape"
                        value="circle" <?php echo $pagination_shape['circle']; ?> >
                    Circle
                </label>
                <label class="block">
                    <input type="radio" name="coeus_post_list_pagination_shape"
                        value="square" <?php echo $pagination_shape['square']; ?> >
                    Square
                </label>
                <label class="block">
                    <input type="radio" name="coeus_post_list_pagination_shape"
                        value="none" <?php echo $pagination_shape['none']; ?> >
                    None
                </label>
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="pagination_buttons">Pagination Layout</label>
            </div>
            <div class="field-wrapper">
                <label class="block">
                    <input type="radio" name="coeus_post_list_pagination_layout"
                        value="buttons" <?php echo $pagination_layout['buttons']; ?> >
                    Previus and Next Button
                </label>
                <label class="block">
                    <input type="radio" name="coeus_post_list_pagination_layout"
                        value="numbers" <?php echo $pagination_layout['numbers']; ?> >
                    Page Numbers
                </label>
                <label class="block">
                    <input type="radio" name="coeus_post_list_pagination_layout"
                        value="both" <?php echo $pagination_layout['both']; ?> >
                    Both
                </label>
            </div>
        </div>
        
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_pagination_shape_bg_color',
                                                                $values['pagination_shape_bg_color'],
                                                                '',
                                                                'Shape Background Color'); ?>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_pagination_text_color',
                                                            $values['pagination_text_color'],
                                                            '',
                                                            'Text Color'); ?>
        </div>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_pagination_active_shape_bg_color',
                                                                $values['pagination_active_shape_bg_color'],
                                                                '',
                                                                'Current Page(Active) Shape Background Color'); ?>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_pagination_active_text_color',
                                                            $values['pagination_active_text_color'],
                                                            '',
                                                            'Current Page(Active) Text Color'); ?>
        </div>

        

        <?php submit_button(); ?>
	</form>
</div>