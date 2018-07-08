<?php
use _8webit\wp_stem\Renderer\Advanced_Field;
use _8webit\wp_stem\Google_Fonts;


$post = 'coeus-customizer-post';

$post_values = array(
    'container' => get_option('coeus_post_container'),
    'layout' => get_option('coeus_post_layout'),
    'bg' => get_option('coeus_post_bg_color'),
    'title_font' => Google_Fonts::get_option('coeus_post_title_font'),
    'title_color' => get_option('coeus_post_title_color'),
    'content_font' => Google_Fonts::get_option('coeus_post_content_font'),
    'content_color' => get_option('coeus_post_content_color'),

    'meta_color' => get_option('coeus_post_meta_color'),
    
    'author_display' => get_option('coeus_post_author_display'),

    'date_display' => get_option('coeus_post_date_display'),
    'date_modified_display'=> get_option('coeus_post_date_modified_display'),

    'category_display' => get_option('coeus_post_category_display'),
    'category_text_color' => get_option('coeus_post_category_text_color'),
    'category_text_bg_color' => get_option('coeus_post_category_text_bg_color'),

    'fb_button_display' => get_option('coeus_post_fb_button_display')
);

$container = get_checked_field( $post_values['container'], array('fixed','fluid'));

$layout = get_checked_field( $post_values['layout'] , array('alfa', 'beta', 'delta', 'epsilon', 'gamma') );

$author_display = $post_values['author_display'] ? 'checked="checked"' : '';
$date_display = $post_values['date_display'] ? 'checked="checked"' : '';
$date_modified_display = $post_values['date_modified_display'] ? 'checked="checked"' : '';
$category_display = $post_values['category_display'] ? 'checked="checked"' : '';
$fb_button_display = $post_values['fb_button_display'] ? 'checked="checked"' : '';


?>

<div id="header-layout">
    <h3> Post </h3>
    <form method="post" action="options.php">
		<?php settings_fields( $post ); ?>
            <div class="coeus-field-group">
                <?php echo Advanced_Field::spectrum('coeus_post_bg_color', $post_values['bg'],
                                                             '',
                                                             'Background Color'); ?>
            </div>

            <div class="coeus-field-group">
                <?php echo Advanced_Field::font(array(
                    'name' => 'coeus_post_title_font',
                    'value' => $post_values['title_font'],
                    'label' => 'Title font'
                )); ?>
            </div>

            <div class="coeus-field-group">
                <?php echo Advanced_Field::spectrum('coeus_post_title_color', $post_values['title_color'],
                    '',
                    'Title Color'); ?>
            </div>

            <div class="coeus-field-group">
                <?php echo Advanced_Field::spectrum('coeus_post_content_color', $post_values['content_color'],
                    '',
                    'Content Text Color'); ?>
            </div>
            
            <div class="coeus-field-group">
                <?php echo Advanced_Field::font(array(
                    'name' => 'coeus_post_content_font',
                    'value' => $post_values['content_font'],
                    'label' => 'Content font'
                )); ?>
            </div>
            
            <hr>
            <h4>Meta </h4>
           
            <div class="coeus-field-group">
                <?php echo Advanced_Field::spectrum('coeus_post_meta_color', $post_values['meta_color'],
                '',
                'Meta(Author,Date) Text Color'); ?>
            </div>

            <h5> Author </h5>
            <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="display_author">Display Author</label>
                </div>
                <div class="field-wrapper">
                    <input id="display_author" type="checkbox" name="coeus_post_author_display" value="true" <?php echo $author_display; ?> >   
                </div>
            </div> 
            
         
            
            <h5>Date</h5>
            <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="date_display">Display Date</label>
                </div>
                <div class="field-wrapper">
                    <input id="date_display" type="checkbox" 
                    name="coeus_post_date_display" value="true" <?php echo $date_display; ?>>   
                </div>
            </div> 

            <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="date_modified_display">Display Modified Date</label>
                </div>
                <div class="field-wrapper">
                    <input id="date_modified_display" type="checkbox" 
                    name="coeus_post_date_modified_display" value="true" <?php echo $date_modified_display; ?> >   
                </div>
            </div> 
            
            <h5>Category</h5>
            <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="category_display">Display Categories</label>
                </div>
                <div class="field-wrapper">
                    <input id="category_display" type="checkbox" 
                    name="coeus_post_category_display" value="true" <?php echo $category_display; ?>>   
                </div>
            </div> 

            <div class="coeus-field-group">
                <?php echo Advanced_Field::spectrum('coeus_post_category_text_color', $post_values['category_text_color'],
                '',
                'Catgory Text Color'); ?>
            </div>

            <div class="coeus-field-group">
                <?php echo Advanced_Field::spectrum('coeus_post_category_text_bg_color', $post_values['category_text_bg_color'],
                '',
                'Category Background Color'); ?>
            </div>
            
            <h5>Facebook</h5>
            <div class="coeus-field-group">
                <div class="label-wrapper">
                    <label for="category_display">Display Facebook Share And Like Buttons</label>
                </div>
                <div class="field-wrapper">
                    <input id="category_display" type="checkbox" 
                    name="coeus_post_fb_button_display" value="true"  <?php echo $fb_button_display; ?>> 
                </div>
            </div> 

		<?php submit_button(); ?>
    </form>
</div>


