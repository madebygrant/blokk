<?php
/**
 * Header: Logo only
 */

return [
	'title'      => __( 'Header: Logo only (Default)', 'blokk' ),
	'categories' => ['header'],
	'blockTypes' => ['core/template-part/header'],
	'content'    => '
                    <!-- wp:group {"className":"site-header__inner","layout":{"inherit":true}} -->
                    <div class="wp-block-group site-header__inner">
                    
                        <!-- wp:group {"className":"site-branding","layout":{"type":"flex"}} -->
                        <div class="wp-block-group site-branding">
                            <!-- wp:site-logo {"width":250} /-->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"className":"site-navigation","layout":{"inherit":true}} -->
                        <div class="wp-block-group site-navigation">
                            <!-- wp:navigation {"layout":{"inherit":true}} -->
                            <!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
                            <!-- /wp:navigation -->
                        </div>
                        <!-- /wp:group -->

                    </div>
                    <!-- /wp:group -->
                    '
];