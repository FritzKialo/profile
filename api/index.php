<?php

/**
 * Vercel entry point for Laravel.
 * Vercel's PHP runtime serves requests through this file.
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Point all path helpers at the project root (one level up from /api)
$root = dirname(__DIR__);

// Maintenance mode check
if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer autoloader
require $root . '/vendor/autoload.php';

// Set public path so asset() and Storage work correctly
$app = require_once $root . '/bootstrap/app.php';

// Tell Laravel where the public directory is
$app->usePublicPath($root . '/public');

$app->handleRequest(Request::capture());
