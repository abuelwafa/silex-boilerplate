<?php

$app->get('/', 'MainController::home')->bind('home');

// admin route
$app->get('/admin', 'AdminController::viewAdmin')->bind('admin');
$app->get('/login', 'AdminController::getLogin')->bind('login');

// uncomment for custom error handling
// $app->error([new MainController, 'errorHandler']);

