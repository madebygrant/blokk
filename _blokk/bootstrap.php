<?php
/**
 * Blokk: Bootstrap
 *
 */

namespace Blokk\Bootstrap;

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) exit;

// ----------------------------

if( !class_exists('Blokk\Bootstrap\Load') ){

    class Load{

        public $errors = [];

        /**
         * Load a file
         *
         * @param string $path
         * @return void
         */
        function load($path){
            file_exists( $path ) ? require_once $path : $this->errors[] = esc_html("Error: '{$path}' not found!");
        }

        // ----

        /**
         * Create error notices 
         *
         * @return void
         */
        function notices(){
            if( count($this->errors) > 0 ){
                ?>
                    <div class="notice notice-error">
                        <ul style="margin:12px 24px;">
                            <?php foreach($this->errors as $error): ?>
                            <li style="line-height:1.75em;list-style:square;">
                                <?php esc_html_e( $error, 'blokk' ); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php
            }
        }

        // ----

        /**
         * The controller to load files for this theme
         *
         * @return void
         */
        function initialise(){

            // Helper functions
            $this->load($this->paths['blokk'] . 'helpers.php');

            // Add block patterns
            $this->load($this->paths['includes'] . 'block-patterns.php');

            // Theme setup
            $this->load($this->paths['blokk'] . 'theme-setup.php');

        }

        function __construct(){
            $this->paths = KARRI_PATHS;
            $this->initialise();
            add_action( 'admin_notices', [ $this, 'notices' ] );
        }

    }

    // ----------------------------

    // Load the bootstrap paths
    require_once __DIR__ . '/paths.php';

    // Load the bootstrap files
    new Load();

}