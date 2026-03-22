<?php

/**
 * Vercel entry point for Laravel.
 *
 * Vercel's filesystem is read-only except for /tmp.
 * This bootstrap redirects Laravel's storage to /tmp and
 * pre-creates all directories Laravel expects to exist.
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$root = dirname(__DIR__);

// ── 1. Redirect storage to /tmp (only writable dir on Vercel) ─────────────
$tmpStorage = '/tmp/storage';

$dirs = [
    "$tmpStorage/app/public",
    "$tmpStorage/framework/cache/data",
    "$tmpStorage/framework/sessions",
    "$tmpStorage/framework/testing",
    "$tmpStorage/framework/views",
    "$tmpStorage/logs",
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Copy framework stubs that Laravel needs on first boot
$stubsToCopy = [
    "$root/storage/framework/cache/.gitignore"   => "$tmpStorage/framework/cache/.gitignore",
    "$root/storage/framework/sessions/.gitignore" => "$tmpStorage/framework/sessions/.gitignore",
    "$root/storage/framework/views/.gitignore"    => "$tmpStorage/framework/views/.gitignore",
];
foreach ($stubsToCopy as $src => $dst) {
    if (file_exists($src) && !file_exists($dst)) {
        copy($src, $dst);
    }
}

// ── 2. Maintenance mode check ─────────────────────────────────────────────
if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// ── 3. Composer autoloader ────────────────────────────────────────────────
require $root . '/vendor/autoload.php';

// ── 4. Boot Laravel ───────────────────────────────────────────────────────
/** @var Application $app */
$app = require_once $root . '/bootstrap/app.php';

// Tell Laravel where public/ and storage/ live
$app->usePublicPath($root . '/public');
$app->useStoragePath($tmpStorage);

// ── 5. Handle request ─────────────────────────────────────────────────────
$app->handleRequest(Request::capture());
