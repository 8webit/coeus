<?php
use _8webit\wp_stem\Enqueue_Scripts;

Enqueue_Scripts::admin_css_cdn(
    'spectrum.css',
    'https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css'
);
Enqueue_Scripts::admin_js_cdn(
    'spectrum.js',
    'https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js'
);


Enqueue_Scripts::admin(
    'admin.css',
    Enqueue_Scripts::get_css_uri(),
    true,
    array('jquery','jquery-ui-autocomplete')
);

Enqueue_Scripts::admin(
    'google_fonts.js',
    Enqueue_Scripts::get_js_uri(),
    true,
    array('jquery','jquery-ui-autocomplete')
);

// Settings
Enqueue_Scripts::admin('coeus_settings.css');
Enqueue_Scripts::admin('coeus_settings.js', '', false,
    array('jquery', 'jquery-ui-datepicker','jquery-ui-sortable', 'jquery-touch-punch'));