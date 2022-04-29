<?php
/**
 * Blokk: Block Patterns
 *
 */

/**
 * Registers block patterns and categories.
 *
 * @return void
 */

function blokk_register_block_patterns() {

    /**
     * Register pattern categories
     */
	$block_pattern_categories = array(
		'featured' => [ 'label' => __( 'Featured', 'blokk' ) ],
		'footer'   => [ 'label' => __( 'Footers', 'blokk' ) ],
		'header'   => [ 'label' => __( 'Headers', 'blokk' ) ],
		'query'    => [ 'label' => __( 'Query', 'blokk' ) ],
		'pages'    => [ 'label' => __( 'Pages', 'blokk' ) ],
	);

	$block_pattern_categories = apply_filters( 'blokk_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

    // ----
    
    /**
     * List the block patterns to be used here
     */
	$block_patterns = [
		'footer/footer-default',
		'header/header-default',
        'header/header-logo-title-tagline',
        'header/header-title-only',
        'header/header-search',
        'hidden/hidden-404',
        'page/page-default',
        'page/page-no-title',
        'post/post-default',
        'query/query-archive',
        'query/query-default',
    ];

	/**
	 * Filters the theme block patterns.
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'blokk_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'blokk/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'blokk_register_block_patterns', 9 );
