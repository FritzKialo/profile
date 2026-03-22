<?php

/**
 * Vercel entry point for Laravel 12.
 *
 * Key constraints on Vercel:
 *  - Filesystem is read-only except /tmp
 *  - No .env file (we inject env defaults below)
 *  - storage/ must be redirected to /tmp BEFORE the app boots
 */

error_reporting(E_ALL);
ini_set('display_errors', '0');        // keep display off — log to stderr instead
ini_set('log_errors', '1');
ini_set('error_log', '/tmp/php_errors.log');

define('LARAVEL_START', microtime(true));

$root = dirname(__DIR__);

// ── 1. Inject env defaults before ANYTHING else ───────────────────────────
$defaults = [
    'APP_NAME'         => 'Francis Kialo',
    'APP_ENV'          => 'production',
    'APP_DEBUG'        => 'true',           // true temporarily so errors are visible
    'APP_URL'          => 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
    'APP_KEY'          => 'base64:' . base64_encode(hash('sha256', 'francis-kialo-vercel-2025-secret', true)),
    'SESSION_DRIVER'   => 'cookie',
    'SESSION_ENCRYPT'  => 'false',
    'CACHE_STORE'      => 'array',
    'LOG_CHANNEL'      => 'stderr',
    'QUEUE_CONNECTION' => 'sync',
    'FILESYSTEM_DISK'  => 'local',
    'DB_CONNECTION'    => 'sqlite',
    'DB_DATABASE'      => ':memory:',
    'BROADCAST_CONNECTION' => 'log',
    'APP_MAINTENANCE_DRIVER' => 'file',
];

foreach ($defaults as $key => $value) {
    if (empty($_ENV[$key]) && empty(getenv($key))) {
        $_ENV[$key]    = $value;
        $_SERVER[$key] = $value;
        putenv("{$key}={$value}");
    }
}

// ── 2. Pre-create all /tmp directories Laravel needs ─────────────────────
$tmpStorage = '/tmp/laravel/storage';

foreach ([
    $tmpStorage . '/app/public',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/testing',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
    '/tmp/laravel/bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// ── 3. Maintenance mode ───────────────────────────────────────────────────
if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// ── 4. Autoloader ─────────────────────────────────────────────────────────
require $root . '/vendor/autoload.php';

// ── 5. Boot Laravel ───────────────────────────────────────────────────────
// In Laravel 11/12 we must override paths on the Application instance
// BEFORE calling create(), which is done via the configure() chain.
$app = \Illuminate\Foundation\Application::configure(basePath: $root)
    ->withRouting(
        web:      $root . '/routes/web.php',
        commands: $root . '/routes/console.php',
        health:   '/up',
    )
    ->withMiddleware(function (\Illuminate\Foundation\Configuration\Middleware $middleware): void {
        //
    })
    ->withExceptions(function (\Illuminate\Foundation\Configuration\Exceptions $exceptions): void {
        //
    })
    ->create();

// Override paths to writable /tmp locations
$app->useStoragePath($tmpStorage);
$app->usePublicPath($root . '/public');

// Also override the bootstrap path so config/route cache goes to /tmp
// (prevents write failures on the read-only project filesystem)
$app->instance('path.bootstrap', '/tmp/laravel/bootstrap');

// ── 6. Serve the request ──────────────────────────────────────────────────
$app->handleRequest(\Illuminate\Http\Request::capture());
