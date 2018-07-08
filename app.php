<?php
   use _8webit\wp_stem\Enqueue_Scripts;

  $style_bundle_uri = Enqueue_Scripts::uri('dist/styles.*.bundle.css');

  $inline_uri = Enqueue_Scripts::uri('dist/inline.*.bundle.js');
  $polyfils_uri = Enqueue_Scripts::uri('dist/polyfills.*.bundle.js');
  $main_uri = Enqueue_Scripts::uri('dist/main.*.bundle.js');
 ?> 
  <!-- Style -->
  <?php require 'style.php'; ?>

  <!-- Angular Style -->
  <link href="<?php echo $style_bundle_uri; ?>" rel="stylesheet" />
</head>

<body>
  <div id="fb-root"></div>

  <?php if(get_option('coeus_post_fb_button_display')): ?>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=<?php echo get_option('coeus_social_fb_app_id'); ?>";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  <?php endif; ?>
    
  <!-- Angular Root -->
  <app-root></app-root>

  <!-- Angular Bundle -->
  <?php
    if($inline_uri){
      echo '<script type="text/javascript" src="'. $inline_uri .'"></script>';
    }

    if($polyfils_uri){
      echo '<script type="text/javascript" src="'. $polyfils_uri .'"></script>';
    }

    if($main_uri){
      echo '<script type="text/javascript" src="'. $main_uri .'"></script>';
    }    
    ?>

  <!-- Adsense -->
  <?php if(get_option('coeus_ad_adsense_enable')  
  &&  !(strtotime( get_option('coeus_ad_expiration_date') ) < strtotime( current_time('d-m-Y') ) )): ?>
  <script type="text/javascript" charset="utf-8">

    var pageOptions = {
      "pubId": "<?php echo get_option('coeus_ad_adsense_client_id'); ?>", // Make sure this the correct client ID!
      "query": "<?php echo get_option('coeus_ad_adsense_query'); ?>",
      "adPage": 1,
      "adtest": "on"
    };

    var adblock1 = {
      "container": "afscontainer1",
      "width": "200",
      "number": 2
    };

    _googCsa('ads', pageOptions, adblock1);
  </script>
  <?php endif; ?>

