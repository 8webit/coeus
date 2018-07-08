<?php 
use _8webit\wp_stem\Renderer\Advanced_Field;

$sidebar_values = array(
    'background_color' => get_option('coeus_sidebar_recent_posts_background_color'),
    'title_display' => get_option('coeus_sidebar_recent_posts_title_display'),
    'title_color' => get_option('coeus_sidebar_recent_posts_title_color'),
    'thumbnail_shape' => get_option('coeus_sidebar_recent_posts_thumbnail_shape'),
    'post_text_color' => get_option('coeus_sidebar_recent_posts_post_text_color'),
    'display_date' => get_option('coeus_sidebar_recent_posts_display_date')
);

$sidebar = 'coeus-customizer-sidebar-recent-post';

$posts_title_display = !empty($sidebar_values['title_display']) ? 'checked="checked"' : '';
$post_date_display = !empty($sidebar_values['display_date']) ? 'checked="checked"' : '';

$recent_posts_thumbnail_shape = get_checked_field($sidebar_values['thumbnail_shape'],['circle','square'])
?>
<div id="coeus-sidebar">
    <h3>Latest Post Sidebar Customizer</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $sidebar ); ?>
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_sidebar_recent_posts_background_color', 
                                                        $sidebar_values['background_color'],
                                                        '',
                                                        'Sidebar Background Color');?>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="sidebar_recent_posts_display_title">Display Sidebar Title</label>
            </div>
            <div class="field-wrapper">
                <input id="sidebar_recent_posts_display_title" type="checkbox" 
                name="coeus_sidebar_recent_posts_title_display" value="true" <?php echo $posts_title_display ?> >
            </div>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_sidebar_recent_posts_title_color', 
                                                        $sidebar_values['title_color'],
                                                        '',
                                                        'Sidebar Title Color');?>
        </div>
        
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="">Thumbnail Shape</label>
            </div>
            <div class="field-wrapper">
                <label for="thumbnail_style_circle" class="block">
                    <input id="thumbnail_style_circle" type="radio" name="coeus_sidebar_recent_posts_thumbnail_shape"
                    value="circle" <?php echo $recent_posts_thumbnail_shape['circle']; ?> >
                    Circle
                </label>
                <label for="thumbnail_style_square">
                    <input id="thumbnail_style_square" type="radio" name="coeus_sidebar_recent_posts_thumbnail_shape"
                    value="square" <?php echo $recent_posts_thumbnail_shape['square']; ?> >
                    Square
                </label>
            </div>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_sidebar_recent_posts_post_text_color', 
                                                        $sidebar_values['post_text_color'],
                                                        '',
                                                        'Text Color');?>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="sidebar_recent_posts_display_date">Display Date</label>
            </div>
            <div class="field-wrapper">
                <input id="sidebar_recent_posts_display_date" type="checkbox" 
                name="coeus_sidebar_recent_posts_display_date" value="true" <?php echo $post_date_display; ?> >
            </div>
        </div>

        <?php submit_button(); ?>
    </form>
</div>