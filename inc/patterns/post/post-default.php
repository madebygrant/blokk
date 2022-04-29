<?php
/**
 * Default post layout
 */

return [
	'title'      => __( 'Default post layout', 'blokk' ),
	'categories' => ['posts'],
	'content'    => '
                    <!-- wp:group {"className":"post__inner","layout":{"inherit":true}} -->
                    <div class="wp-block-group post__inner">
                    
                        <!-- wp:post-featured-image {"className":"featured post__featured","isLink":true} /-->

                        <!-- wp:group {"className":"post__heading","layout":{"inherit":true}} -->
                        <div class="wp-block-group post__heading">
                            <!-- wp:post-title {"isLink":true} /-->
                            <!-- wp:post-date /-->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"className":"post__content","layout":{"inherit":true}} -->
                        <div class="wp-block-group post__content">
                            <!-- wp:post-excerpt /-->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"className":"post__meta","layout":{"inherit":true}} -->
                        <div class="wp-block-group post__meta">
                            <!-- wp:post-terms {"term":"category","fontSize":"small"} /-->
                            <!-- wp:post-terms {"term":"post_tag","fontSize":"small"} /-->
                        </div>
                        <!-- /wp:group -->

                    </div>
                    <!-- /wp:group -->
                    '
];