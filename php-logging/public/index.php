<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mamlzy\PhpLogging\App\Router;
use Mamlzy\PhpLogging\Controller\{AuthController, HomeController, ProductController};
use Mamlzy\PhpLogging\Middleware\AuthMiddleware;

Router::add(
  'GET',
  '/login',
  AuthController::class,
  'login',
);
Router::add('GET', '/', HomeController::class, 'index');
Router::add(
  'GET',
  '/hello',
  HomeController::class,
  'hello',
  [AuthMiddleware::class]
);
Router::add(
  'GET',
  '/world',
  HomeController::class,
  'world',
  [AuthMiddleware::class]
);
Router::add(
  'GET',
  '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)',
  ProductController::class,
  'categories'
);

Router::run();
