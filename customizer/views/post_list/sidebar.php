<?php  
$sidebar = 'coeus-customizer-post-list-sidebar';

   $sidebar_values = array(
    'post_list_left' => get_option('sidebar_post_list_left'),
    'post_list_right' => get_option('sidebar_post_list_right')
   );
?>


<div id="coeus-sidebar">
    <h3>Drag & Drop Sidebar Customizer</h3>
    <form method="post" action="options.php">
        <?php settings_fields( $sidebar ); ?>
        <hr>
        <h4> Sidebar Customizer</h4>
        <?php echo coeus_sidebar_customizer('post_list',
                                            array(
                                                'categories' => 'Categories',
                                                'recent_posts' => 'Latest Posts',
                                                'adsense_200_600' => 'Adsense (200x600)',
                                                'about_author' => 'About Author',
                                                'search' => 'Search Box'
                                            ),
                                            json_decode($sidebar_values['post_list_left']),
                                            json_decode($sidebar_values['post_list_right']));
        ?>
        
        <?php submit_button(); ?>
    </form>
</div>