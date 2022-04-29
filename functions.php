<?php
/**
 * Blokk: Functions
 *
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) exit;

// ----------------------------

// Bootstrap vital 'Blokk' files

require_once __DIR__ . '/_blokk/bootstrap.php';

// ----------------------------

// Load and configure 'WP Sides' sidebars and met
// Note: Requires the 'WP Sides' plugin to be activated

if( defined( 'WPSIDES_PLUGIN_VERSION' ) ){
    require_once __DIR__ . '/inc/wp-sides.php';
}

// ----------------------------

// Enqueue stylesheets & scripts

add_filter('blokk-enqueued', function($enqueued){
    
    // The theme's main JS file
    $enqueued['theme'] = [
        'file' => 'assets/js/theme.min.js',
        'type' => 'script',
        'footer' => true
    ];

    // The 'Google Fonts' stylesheet, loading fonts from Google Fonts service.
    $enqueued['google-fonts'] = [ 
        'url' => 'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', 
        'type' => 'stylesheet' 
    ];

    return $enqueued;
    
});

// ----------------------------

// Enqueue stylesheets & scripts for the editor

add_filter('blokk-editor-enqueued', function($enqueued){
    
    // The file that configures which blocks and block styles are used in the editor
    $enqueued['blocks-config'] = [ 
        'file' => 'assets/js/blocks-config.js', 
        'type' => 'script' 
    ];

    return $enqueued;

});

add_filter('blokk-custom-template-post-states', function() {
    return [
        'page-no-title' => 'This page does not display the page title'
    ];
});