<?php
use _8webit\wp_stem\Renderer\Advanced_Field;

    $sidebar_values = array(
        'post_list_left' => get_option('sidebar_post_list_left'),
        'post_list_right' => get_option('sidebar_post_list_right'),
        'post_left' => get_option('sidebar_post_left'),
        'post_right' => get_option('sidebar_post_right'),
        'categories_bg_color' => get_option('coeus_sidebar_categories_bg_color'),
        'categories_color' => get_option('coeus_sidebar_categories_color'),
        'categories_active_bg_color' => get_option('coeus_sidebar_categories_active_bg_color'),        
        'categories_active_color' => get_option('coeus_sidebar_categories_active_color'),
        'recent_posts_background_color' => get_option('coeus_sidebar_recent_posts_background_color'),
        'recent_posts_title_display' => get_option('coeus_sidebar_recent_posts_title_display'),
        'recent_posts_title_color' => get_option('coeus_sidebar_recent_posts_title_color'),
        'recent_posts_thumbnail_shape' => get_option('coeus_sidebar_recent_posts_thumbnail_shape'),
        'recent_posts_post_text_color' => get_option('coeus_sidebar_recent_posts_post_text_color'),
        'recent_posts_display_date' => get_option('coeus_sidebar_recent_posts_display_date'),
        'author_title' => get_option('coeus_sidebar_author_title'),
        'author_user' => get_option('coeus_sidebar_author_user'),
        'author_user_auto_detect' => get_option('coeus_sidebar_author_user_auto_detect'),
        'author_bg_color' => get_option('coeus_sidebar_author_bg_color'),
        'author_text_color' => get_option('coeus_sidebar_author_text_color', array()),
        'author_avatar_shape' => get_option('coeus_sidebar_author_avatar_shape', array()),
    );

    $sidebar = 'coeus-customizer-sidebar';

    $posts_title_display = !empty($sidebar_values['recent_posts_title_display']) ? 'checked="checked"' : '';
    $post_date_display = !empty($sidebar_values['recent_posts_display_date']) ? 'checked="checked"' : '';
    $author_auto_detect = !empty($sidebar_values['author_user_auto_detect']) ? 'checked="checked"' : '';

    $recent_posts_thumbnail_shape = get_checked_field($sidebar_values['recent_posts_thumbnail_shape'], ['circle', 'square']);
    $author_avatar_shape = get_checked_field($sidebar_values['author_avatar_shape'], ['circle', 'square'])
?>

<div id="coeus-sidebar">
    <h3>Drag & Drop Sidebar Customizer</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $sidebar ); ?>
        <hr>
        <h4>Post List Sidebar Customizer</h4>
        <?php echo coeus_sidebar_customizer('post_list',
                                            array(
                                                'categories' => 'Categories',
                                                'recent_posts' => 'Latest Posts',
                                                'adsense_200_600' => 'Adsense (200x600)',
                                                'about_author' => 'About Author',
                                                'search' => 'Search Box'
                                            ),
                                            json_decode($sidebar_values['post_list_left']),
                                            json_decode($sidebar_values['post_list_right'])); ?>
        <hr>
        <h4>Post Sidebar Customizer</h4>
        <?php echo coeus_sidebar_customizer('post',
                                            array(
                                                'categories' => 'Categories',
                                                'recent_posts' => 'Recent Posts',
                                                'adsense_200_600' => 'Adsense (200x600)',
                                                'about_author' => 'About Author',
                                                'search' => 'Search Box'
                                            ),
                                            json_decode($sidebar_values['post_left']),
                                            json_decode($sidebar_values['post_right'])); ?>
        <hr><hr>
        <h3>Customize Sidebars individually</h3>
        <hr><hr>

        
        <hr>
        <h4>About author sidebar customizer</h4>
        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="author_title">Title</label>
            </div>
            <div class="field-wrapper">
                <input id="author_title" type="text" name="coeus_sidebar_author_title" value="<?php echo $sidebar_values['author_title']; ?>">
            </div>
        </div>

        <div class="coeus-field-group">
            <div class="label-wrapper">
                <label for="author_user">Choose Author/User</label>
            </div>
            <div class="field-wrapper">
                <input id="author_user" class="autocomplete-user" type="text" 
                name="coeus_sidebar_author_user" value="<?php echo $sidebar_values['author_user']; ?>">
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
                                                        $sidebar_values['author_bg_color'],
                                                        '',
                                                        'Sidebar Background Color');?>
        </div>
       
        <div class="coeus-field-group">
            <?php echo Advanced_Field::spectrum('coeus_sidebar_author_text_color', 
                                                        $sidebar_values['author_text_color'],
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