<?php

/**
 * Configure 'WP Sides' sidebars and meta
 * Note: Requires the 'WP Sides' plugin
 */

// Register sidebars if using the 'WP Sides' plugin

add_filter('blokk-editor-enqueued', function($enqueued){

    // Sample sidebar
    $enqueued['sidebar-sample'] = [ 
        'file' => 'assets/js/sidebars/sidebar-sample.js', 
        'type' => 'script' 
    ];
    
    return $enqueued;
});

// ----------------------------

// Register 'WP Sides' sidebars meta.
// Note: An underscore prefixed slug is required to register the sidebar meta.

add_action('init', function() {

    // Page sidebar
    register_meta(
        'post', 
        '_page_sidebar_meta', // Underscore prefix required!
        [
            'type' => 'string',
            'object_subtype' => 'page',
            'show_in_rest' => true,
            'single' => true,
            'auth_callback' => function(){
                return current_user_can('edit_posts');
            }
        ]
    );

});