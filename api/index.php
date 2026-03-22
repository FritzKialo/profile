<?php

/**
 * Vercel entry point for Laravel.
 *
 * Handles two Vercel-specific constraints:
 *  1. Read-only filesystem  → redirect storage to /tmp
 *  2. No .env file          → inject required config via $_ENV
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$root = dirname(__DIR__);

// ── 1. Inject essential env values if not already set ─────────────────────
//    This allows zero-config deployment from GitHub → Vercel.
$defaults = [
    'APP_NAME'        => 'Francis Kialo',
    'APP_ENV'         => 'production',
    'APP_DEBUG'       => 'false',
    'APP_URL'         => 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
    // Generate a stable key from a project-specific secret so it survives
    // across cold starts (Vercel re-uses the same image per deployment).
    'APP_KEY'         => 'base64:' . base64_encode(hash('sha256', 'francis-kialo-portfolio-key-2025', true)),
    'SESSION_DRIVER'  => 'cookie',   // no filesystem needed
    'CACHE_STORE'     => 'array',    // in-memory, no filesystem needed
    'LOG_CHANNEL'     => 'stderr',   // Vercel captures stderr as runtime logs
    'QUEUE_CONNECTION'=> 'sync',
    'FILESYSTEM_DISK' => 'local',
    'DB_CONNECTION'   => 'sqlite',
    'DB_DATABASE'     => '/tmp/database.sqlite',
];

foreach ($defaults as $key => $value) {
    if (empty($_ENV[$key]) && empty(getenv($key))) {
        $_ENV[$key] = $value;
        putenv("$key=$value");
        $_SERVER[$key] = $value;
    }
}

// ── 2. Redirect storage to /tmp (only writable dir on Vercel) ─────────────
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

// ── 3. Maintenance mode check ─────────────────────────────────────────────
if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// ── 4. Composer autoloader ────────────────────────────────────────────────
require $root . '/vendor/autoload.php';

// ── 5. Boot Laravel ───────────────────────────────────────────────────────
/** @var Application $app */
$app = require_once $root . '/bootstrap/app.php';

$app->usePublicPath($root . '/public');
$app->useStoragePath($tmpStorage);

// ── 6. Handle request ─────────────────────────────────────────────────────
$app->handleRequest(Request::capture());
