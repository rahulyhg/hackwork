<?php

/**
 * Hackwork
 *
 * Simple, layout-based PHP micro framework for making HTML5 sites.
 * http://git.io/hackwork
 */

/*
 * Paths
 *
 * Remember, no trailing slashes!
 */

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATH', ROOT);
define('ASSETS', '/assets');
define('CORE', PATH . '/core');
define('DATA', PATH . '/data');
define('LAYOUTS', PATH . '/layouts');

/*
 * Import helpers
 */

foreach (glob(CORE . '/*.php') as $helper) {
  if (!preg_match('/hackwork.php$/', $helper)) {
    require_once($helper);
  }
}

/*
 * Environment
 *
 * Values:
 *   development
 *   production
 */

define('ENVIRONMENT', 'development');

// Define consistent error reporting settings
switch (ENVIRONMENT) {
  case 'development':
    error_reporting(-1);
    ini_set('display_errors', 1);
  break;

  case 'production':
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
  break;

  default:
    _throwerr('Application environment is wrong.', $_header[503], 503,
              EXIT_CONFIG);
}