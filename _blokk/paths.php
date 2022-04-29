<?php
/**
 * Blokk: Paths
 *
 */

namespace Blokk\Bootstrap;

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) exit;

// ----------------------------

// The theme directory 'app' filepath
$theme_path = get_stylesheet_directory();

// Paths of the bootstrapped files
$blokk_paths = [
    'theme' => $theme_path . '/',
    'blokk' => $theme_path . '/_blokk/',
    'includes' => $theme_path . '/inc/',
    'patterns' => $theme_path . '/inc/patterns/',
    'assets' => $theme_path . '/assets/',
    'parts' => $theme_path . '/parts/',
    'template' => $theme_path . '/templates/',
];

define('KARRI_PATHS', $blokk_paths);