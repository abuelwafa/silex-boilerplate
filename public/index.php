<?php

// proper static file serving through php 5.4+ built in server
// remove from production
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
	return false;
}

// composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// application bootstrap
require_once __DIR__ . '/../app/app.php';

$app["debug"] = true; // remove from production

$app->run();
