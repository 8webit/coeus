<?php 
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Google_Fonts;

$group = 'coeus-customizer-post-list-modify-layout';

$post_list_values = array(
    'item_bg_color' => get_option('coeus_post_list_item_bg_color'),
    'item_text_color' => get_option('coeus_post_list_item_text_color'),
    'meta_display' => get_option('coeus_post_list_meta_display'),
    'title_font' => Google_Fonts::get_option('coeus_post_list_title_font'),
    'title_color' => get_option('coeus_post_list_title_color'),
    'content_display' => get_option('coeus_post_list_content_display'),
    'thumbnail_display' => get_option('coeus_post_list_thumbnail_display'),
    'content_font' => Google_Fonts::get_option('coeus_post_list_content_font')
);

$meta_display = $post_list_values['meta_display'] ? 'checked="checked"' : '';

$thumbnail_display = $post_list_values['thumbnail_display'] ? 'checked="checked"' : '';

$content_display = $post_list_values['content_display'] ? 'checked="checked"' : '';
?>

<div id="post-list-layout-cusomizer">
    <h3> Modify Layout</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $group ); ?>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_item_bg_color',
                                                                $post_list_values['item_bg_color'],
                                                                '',
                                                                'Background color'); ?>
        </div>
        
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_item_text_color',
                                                                $post_list_values['item_text_color'],
                                                                '',
                                                                'Text color'); ?>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="display_meta">Display Post Meta</label>
            </div>
            <div class="field-wrapper">
            <input id="display_meta" type="checkbox" name="coeus_post_list_meta_display" value="true" <?php
                    echo $meta_display ?> >
            </div>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::font(array(
                    'name' => 'coeus_post_list_title_font',
                    'value' => $post_list_values['title_font'] ,
                    'label' => 'Title Font'
                ));?>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_post_list_title_color',
                                                                $post_list_values['title_color'],
                                                                '',
                                                                'Title Color'); ?>
        </div>
        
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="display_thumbnail_display">Display Thumbnail</label>
            </div>
            <div class="field-wrapper">
                <input id="display_thumbnail_display" type="checkbox" 
                name="coeus_post_list_thumbnail_display" value="true" <?php echo $thumbnail_display; ?> >
            </div>
        </div>
        
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="display_content">Display Content</label>
            </div>
            <div class="field-wrapper">
                <input id="display_content" type="checkbox" 
                name="coeus_post_list_content_display" value="true" <?php echo $content_display; ?> >
            </div>
        </div>
        
        <div class="coeus-field-group">
            <?php echo Advanced_Field::font(array(
                    'name' => 'coeus_post_list_content_font',
                    'value' => $post_list_values['content_font'] ,
                    'label' => 'Content Font'
                ));?>
        </div>
        
        <?php submit_button(); ?>
    </form>
</div>