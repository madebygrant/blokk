<?php
/**
 * Blokk: Theme Setup
 *
 */

namespace Blokk;

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) exit;

// ----------------------------

if( !class_exists('Blokk\ThemeSetup') ){

    class ThemeSetup{

        private $enqueued;
        private $theme_version;

        /**
         * Setup the theme
         * 
         * @return void
         */
        function after_setup() {

            $editor_stylesheets = [];
            $enqueued = apply_filters( 'blokk-enqueued', []);
            
            if( array_key_exists('google-fonts', $enqueued ) ){
                $editor_stylesheets[] = $enqueued['google-fonts']['url'];
            }
            if( array_key_exists('adobe-fonts', $enqueued ) ){
                $editor_stylesheets[] = $enqueued['adobe-fonts']['url'];
            }

            $editor_stylesheets[] = get_template_directory_uri() . '/assets/css/editor.css';

            // Enable support for post thumbnails and featured images
            add_theme_support( 'post-thumbnails' );

            // Add support for block styles.
            add_theme_support( 'wp-block-styles' );

            // Add support for editor styles.
		    add_theme_support( 'editor-styles' );

            // Enqueue editor styles.
            add_editor_style( $editor_stylesheets );

            // Remove WordPress's core patterns
            remove_theme_support( 'core-block-patterns' );
        }

        /**
         * Enqueue styles and scripts.
         * 
         * @return void
         */
        function setup_enqueued() {

            // Register theme stylesheet.
            wp_register_style( 'blokk-style', get_template_directory_uri() . '/assets/css/theme.css', [], $this->theme_version);

            // Add styles inline.
            wp_add_inline_style( 'blokk-style', apply_filters( 'blokk_inline_styles', '') );

            // Enqueue theme stylesheet.
            wp_enqueue_style( 'blokk-style' );

            // ----

            // Enqueue other stylesheets and scripts
            $this->enqueued = apply_filters( 'blokk-enqueued', []);

            if( !empty($this->enqueued) && is_array($this->enqueued) ){
                
                foreach( $this->enqueued as $handle => $data ){

                    $is_url = isset($data['url']);
                    $in_footer = isset($data['footer']) ? $data['footer'] : false;
                    $deps = isset($data['deps']) && is_array($data['deps']) ? $data['deps'] : [];
                    $media = isset($data['media']) && $data['media'] ? $data['media'] : 'all';
                    $version = isset($data['version']) && !empty($data['version']) ? (float) $data['version'] : null;
                    $handle = sanitize_text_field( $handle );

                    // Enqueue stylesheets
                    if( $data['type'] === 'stylesheet' ){
                        if( $is_url ){
                            wp_enqueue_style( $handle, esc_url($data['url']), $deps, $this->theme_version, $media );
                        }
                        else{
                            wp_enqueue_style( $handle, get_theme_file_uri( esc_html($data['file']) ), $deps, $version, $media );
                        }
                    }

                    // Enqueue scripts
                    else if( $data['type'] === 'script' ){
                        if( $is_url ){
                            wp_enqueue_script( $handle, esc_url($data['url']), $deps, $version, $in_footer );
                        }
                        else{
                            wp_enqueue_script( $handle, get_theme_file_uri( esc_html($data['file']) ), $deps, $version, $in_footer );
                        }
                    }

                }

            }

        }

        /**
         * Enqueue extra files for the block editor
         *
         * @return void
         */
        function block_editor_enqueued() {
            $enqueued = apply_filters( 'blokk-editor-enqueued', []);

            if( !empty($enqueued) && is_array($enqueued) ){
                
                foreach( $enqueued as $handle => $data ){
                    $handle = sanitize_text_field( $handle );

                    // Enqueue stylesheets
                    if( $data['type'] === 'stylesheet' ){
                        wp_enqueue_style( $handle, get_theme_file_uri( esc_html($data['file']) ), [ 'wp-edit-blocks' ], $this->theme_version );
                    }

                    // Enqueue scripts
                    else if( $data['type'] === 'script' ){
                        wp_enqueue_script( $handle, get_theme_file_uri( esc_html($data['file']) ), [ 'wp-blocks', 'wp-dom' ], $this->theme_version, true );
                    }
                    
                }
            }
        }

        /**
         * Preload Google and Adobe web fonts if being used
         *
         * @return void
         */
        function preload_webfonts() {
            if( array_key_exists('google-fonts', $this->enqueued ) ):
            ?>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <?php
            endif;

            if( array_key_exists('adobe-fonts', $this->enqueued ) ):
            ?>
                <link rel="preload" href="<?php esc_url( $this->enqueued['adobe-fonts']['url'] ); ?>" as="style" crossorigin>
            <?php
            endif;
        }

        /**
         * Display post state message via page templates
         *
         * @param array $custom_states
         * @param object $post
         * @return array $post_states
         */
         function display_custom_post_states($post_states, $post){
            $get_template = get_post_meta($post->ID, '_wp_page_template', 1);
            $custom_states = apply_filters( 'blokk-custom-template-post-states', []);

            if($custom_states){
                foreach( $custom_states as $template => $message ){
                    if($get_template === $template){
                        $post_states[] =  esc_html($message);
                    }
                }
            }

            return $post_states;
        }

        /**
         * Disable the SVG filters supplied by theme.json
         *
         * @return void
         */
        function disable_duotones_svg_filters() {
            $bool = apply_filters( 'blokk-enable-global-svg-filters', false);
            if(!$bool){
                remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
            } 
        }
        
        function __construct(){
            $this->theme_version = wp_get_theme()->get( 'Version' );

            add_action( 'after_setup_theme', [ $this, 'after_setup' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'setup_enqueued' ] );
            add_action( 'wp_head', [ $this, 'preload_webfonts' ] );
            add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor_enqueued' ] );
            add_filter( 'display_post_states', [ $this, 'display_custom_post_states' ], 10, 2 );
            add_action( 'wp_head', [ $this, 'disable_duotones_svg_filters' ] );
        }

    }

    new ThemeSetup;

}