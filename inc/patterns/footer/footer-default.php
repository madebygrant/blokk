<?php
/**
 * Default footer
 */

use \Blokk\Helpers as Helpers;

return [
	'title'      => __( 'Default footer', 'blokk' ),
	'categories' => ['footer'],
	'blockTypes' => ['core/template-part/footer'],
	'content'    => '
                    <!-- wp:group {"className":"footer-inner","layout":{"inherit":true,"tagName":"div"}} -->
                    <div class="wp-block-group footer-inner">

                        <!-- wp:paragraph {"align":"right"} -->
                        <p class="copyright">' . Helpers::sprintf('&copy; %s All Rights Reserved.', [ date('Y') ]) . '</p>
                        <!-- /wp:paragraph -->

                    </div>
					<!-- /wp:group -->
                    '
];