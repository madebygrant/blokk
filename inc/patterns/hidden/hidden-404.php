<?php
/**
 * Default 404 page
 */

use \Blokk\Helpers as Helpers;

return [
	'title'      => __( 'Default 404 page', 'blokk' ),
	'categories' => ['pages'],
	'content'    => '
                    <!-- wp:group {"tagName":"header", "layout":{"inherit":true}} -->
                    <header class="wp-block-group page-title">
                        <!-- wp:heading {"level":1, "className":"page-title__heading"} -->
                        <h1 class="page-title__heading">'. __( "404: Page not found!", "blokk" ) .'</h1>
                        <!-- /wp:heading -->
                    </header>
                    <!-- /wp:group -->
                    

                    <!-- wp:paragraph -->
                    <p>'. __( "Sorry, this page doesn't seem to exist.", "blokk") .'</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    ' . Helpers::sprintf(__("Go back to the %s", "blokk"), ["<a href='".esc_url(site_url())."'>home page?</a>"]) . '
                    <!-- /wp:paragraph -->
                    '
];