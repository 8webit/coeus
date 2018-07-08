 <!DOCTYPE html>
<html>

<?php if(is_single()): ?>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article# http://ogp.me/ns/profile#">
<?php else:?>
  <head> 
<?php endif;?>
    <?php wp_head();?>
    <title>Welcome</title>
    <base href="<?php echo get_site_url(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?php if(get_option('coeus_ad_adsense_enable') 
    &&  !(strtotime( get_option('coeus_ad_expiration_date') ) < strtotime( current_time('d-m-Y') ) ) ): ?>
      <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
      <script type="text/javascript" charset="utf-8">
      (function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
        arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
      </script>
    <?php endif;?>
    
    <!-- RDFa -->
    <meta property="fb:app_id" content="<?php echo get_option('coeus_social_fb_app_id') ?>" />
    <?php if(is_single()):
      $thumbnail  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "post-thumbnail" );
      
      ?>
      
      <meta property="og:type" content="article" />
      <meta property="og:title" content="<?php echo get_the_title(); ?>" />
      <meta property="og:url" content="<?php echo get_permalink(); ?>" />
      <meta property="og:image" content="<?php echo $thumbnail[0]; ?>" />
      <meta property="og:image:width" content="<?php echo $thumbnail[1]; ?>" />
      <meta property="og:image:height" content="<?php echo $thumbnail[2]; ?>" />
      <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
      
    <?php else:
        $args = [
          'post_type' => 'page',
          'fields' => 'ids',
          'nopaging' => true,
          'meta_key' => '_wp_page_template',
          'meta_value' => 'template-home.php'
      ];
      $pages =get_posts( $args );
      $id = count($pages) > 0 ? $pages[0] : get_the_ID();
      $home_page = get_post($id);
      $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), "post-thumbnail" );
      ?>
      
      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo !is_category() ? $home_page->post_title : get_the_category()[0]->name; ?>" />
      <meta property="og:url" content="<?php echo !is_category() ? get_permalink() : get_category_link(get_the_category()[0]->cat_ID); ?>" />
      <meta property="og:image" content="<?php echo $thumbnail[0]; ?>" />
      <meta property="og:image:width" content="<?php echo $thumbnail[1]; ?>" />
      <meta property="og:image:height" content="<?php echo $thumbnail[2]; ?>" />
      <meta property="og:description" content="<?php echo !is_category() ?  wp_strip_all_tags($home_page->post_content) : get_the_category()[0]->description; ?>" />

    <?php endif;?>