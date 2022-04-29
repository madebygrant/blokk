<?php
/**
 * Header: With logo, title, tagline and search bar
 */

 return [
	'title'      => __( 'Header: With logo, title, tagline and search bar', 'blokk' ),
	'categories' => ['header'],
	'blockTypes' => ['core/template-part/header'],
	'content'    => '
                    <!-- wp:group {"className":"site-header__inner","layout":{"inherit":true}} -->
                    <div class="wp-block-group site-header__inner">

                        <!-- wp:group {"className":"site-header__search","layout":{"inherit":true}} -->
                        <div class="wp-block-group site-header__search">
                            <!-- wp:search {"label":"Search","showLabel":false,"width":100,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true} /-->
                        </div>
                        <!-- /wp:group -->
                    
                        <!-- wp:group {"className":"site-branding","layout":{"type":"flex"}} -->
                        <div class="wp-block-group site-branding">
                            <!-- wp:site-logo {"width":64} /-->
                            <!-- wp:site-title /-->
                            <!-- wp:site-tagline /-->
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