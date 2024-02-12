<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Timber site set up
require_once __DIR__ . '/inc/site-setup.php';

// Post type declarations
require_once __DIR__ . '/inc/post-types.php';

// Post type declarations
require_once __DIR__ . '/inc/taxonomies.php';

// Menu declarations
require_once __DIR__ . '/inc/menus.php';

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = [ 'views' ];


new StarterSite();