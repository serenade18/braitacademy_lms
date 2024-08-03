<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->call('cache:clear');
$kernel->call('config:clear');
$kernel->call('config:cache');
$kernel->call('route:clear');
$kernel->call('view:clear');

echo "All caches cleared!";
