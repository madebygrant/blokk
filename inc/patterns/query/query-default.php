<?php
/**
 * Default posts block pattern
 */
return [
	'title'      => __( 'Default posts', 'blokk' ),
	'categories' => [ 'query' ],
	'blockTypes' => [ 'core/query' ],
    'content' => '
                <!-- wp:query {"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":""},"className":"post-query","layout":{"inherit":true}} -->

                <div class="wp-block-query post-query">

                    <!-- wp:post-template -->

                        <!-- wp:pattern {"slug":"blokk/post/post-default"} /-->

                    <!-- /wp:post-template -->
                
                    <!-- wp:query-pagination -->
                        <!-- wp:query-pagination-previous /-->
                        <!-- wp:query-pagination-numbers /-->
                        <!-- wp:query-pagination-next /-->
                    <!-- /wp:query-pagination -->

                </div>
                
                <!-- /wp:query -->
                '
];