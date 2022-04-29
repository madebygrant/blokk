<?php
/**
 * Default page layout
 */

return [
	'title'      => __( 'Default page layout', 'blokk' ),
	'categories' => ['pages'],
	'content'    => '
                    <!-- wp:post-featured-image {"className":"featured featured--wide page-featured","isLink":false} /-->
                    
                    <!-- wp:group {"className":"page-content","layout":{"inherit":true}} -->
                    <div class="wp-block-group page-content">
                        <!-- wp:post-content {"layout":{"inherit":true}} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:post-comments /-->
                    '
];