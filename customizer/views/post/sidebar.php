<?php
use _8webit\wp_stem\Renderer\Field_Renderer;

$group = 'coeus-customizer-post-sidebar';

$sidebar_values = array(
    'post_left' => get_option('sidebar_post_left', ''),
    'post_right' => get_option('sidebar_post_right', '')
);  
?>
<div>
    <h4>Drag & Drop Sidebar Customizer</h4>
    <form method="post" action="options.php">
    <?php settings_fields( $group ); ?>
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
    <?php submit_button(); ?>
    </form>
</div>