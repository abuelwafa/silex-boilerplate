<?php

$app = new Silex\Application();

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\SessionServiceProvider());

// secure admin pages with basic authentication
$app->register(new Silex\Provider\SecurityServiceProvider(), [
	"security.firewalls" => [
		'admin' => [
			'pattern' => '^/admin',
			'form' => ['login_path' => '/login', 'check_path' => '/admin/authenticate'],
			'logout' => array('logout_path' => '/admin/logout'),
			'users' => [
				// user is for development purpose only
				// raw password is admin
				'admin' => ['ROLE_ADMIN', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==']
			]
		]
	]
]);

// register doctrine DB abstraction layer service
$app->register(new Silex\Provider\DoctrineServiceProvider(), [
	"db.options" => [
		"driver" => "pdo_mysql",
		"dbname" => "database_name",
		"host" => "localhost",
		"user" => "root",
		"password" => "root"
	]
]);

// register twig templating engine service
$app->register(new Silex\Provider\TwigServiceProvider(), [
	"twig.path" => __DIR__ . "/views"
]);

// get the application routes
require_once __DIR__ . '/routes.php';

