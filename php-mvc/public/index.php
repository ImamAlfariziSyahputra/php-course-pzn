<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mamlzy\PhpMvc\App\Router;
use Mamlzy\PhpMvc\Controller\{AuthController, HomeController, ProductController};
use Mamlzy\PhpMvc\Middleware\AuthMiddleware;

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
