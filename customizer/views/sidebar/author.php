<?php
use _8webit\wp_stem\Renderer\Advanced_Field;

    $sidebar_values = array(
        'title' => get_option('coeus_sidebar_author_title'),
        'user' => get_option('coeus_sidebar_author_user'),
        'auto_detect' => get_option('coeus_sidebar_author_user_auto_detect'),
        'bg_color' => get_option('coeus_sidebar_author_bg_color'),
        'text_color' => get_option('coeus_sidebar_author_text_color'),
        'avatar_shape' => get_option('coeus_sidebar_author_avatar_shape'),
    );

    $sidebar = 'coeus-customizer-sidebar-author';
    
    $author_auto_detect = !empty($sidebar_values['auto_detect']) ? 'checked="checked"' : '';
    $author_avatar_shape = get_checked_field($sidebar_values['avatar_shape'], ['circle', 'square'])
?>

<div id="coeus-sidebar">
    <h3>Author Sidebar Customizer</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $sidebar ); ?>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="author_title">Title</label>
            </div>
            <div class="field-wrapper">
                <input id="author_title" type="text" name="coeus_sidebar_author_title" value="<?php echo $sidebar_values['title']; ?>">
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="author_user">Choose Author/User</label>
            </div>
            <div class="field-wrapper">
                <input id="author_user" class="autocomplete-user" type="text" 
                name="coeus_sidebar_author_user" value="<?php echo $sidebar_values['user']; ?>">
            </div>
        </div>
        
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="author_user_auto_detect">Automatically detect user/author</label>
            </div>
            <div class="field-wrapper">
                <input id="author_user_auto_detect" type="checkbox" 
                name="coeus_sidebar_author_user_auto_detect" value="true" <?php echo $author_auto_detect; ?> >
            </div>
        </div>

        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_sidebar_author_bg_color', 
                                                        $sidebar_values['bg_color'],
                                                        '',
                                                        'Sidebar Background Color');?>
        </div>
       
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_sidebar_author_text_color', 
                                                        $sidebar_values['text_color'],
                                                        '',
                                                        'Sidebar Text Color');?>
        </div>
       
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="">Avatar Shape</label>
            </div>
            <div class="field-wrapper">
                <label for="avatar_shape_circle" class="block">
                    <input id="avatar_shape_circle" type="radio" name="coeus_sidebar_author_avatar_shape"
                    value="circle" <?php echo $author_avatar_shape['circle']; ?> >
                    Circle
                </label>
                <label for="avatar_shape_square">
                    <input id="avatar_shape_square" type="radio" name="coeus_sidebar_author_avatar_shape"
                    value="square" <?php echo $author_avatar_shape['square']; ?> >
                    Square
                </label>
            </div>
        </div>

        <?php submit_button(); ?>
    </form>
</div>