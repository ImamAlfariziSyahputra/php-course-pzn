<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mamlzy\PhpAuth\App\Router;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Controller\{HomeController, UserController};

Database::getConnection('prod');

//! Home
Router::add('GET', '/', HomeController::class, 'index');

//! Auth
Router::add('GET', '/users/register', UserController::class, 'register');
Router::add('POST', '/users/register', UserController::class, 'postRegister');
Router::add('GET', '/users/login', UserController::class, 'login');
Router::add('POST', '/users/login', UserController::class, 'postLogin');

Router::run();
