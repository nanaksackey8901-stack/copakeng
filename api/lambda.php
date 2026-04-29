<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$writableDirectories = [
    '/tmp/laravel/cache',
    '/tmp/laravel/storage/framework/cache/data',
    '/tmp/laravel/storage/framework/sessions',
    '/tmp/laravel/storage/framework/views',
    '/tmp/laravel/storage/logs',
];

foreach ($writableDirectories as $directory) {
    if (! is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
