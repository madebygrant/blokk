<?php
/**
 * Default page layout
 */

return [
	'title'      => __( 'Default page layout', 'blokk' ),
	'categories' => ['pages'],
	'content'    => '

                    <!-- wp:post-featured-image {"className":"featured featured--wide page-featured","isLink":false} /-->

                    <!-- wp:group {"tagName":"header","className":"page-title","layout":{"inherit":true}} -->
                    <header class="wp-block-group page-title">
                        <!-- wp:post-title {"level":1,"className":"page-title__heading"} /-->
                    </header>
                    <!-- /wp:group -->

                    <!-- wp:group {"className":"page-content","layout":{"inherit":true}} -->
                    <div class="wp-block-group page-content">
                        <!-- wp:post-content {"layout":{"inherit":true}} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:post-comments /-->
                    '
];