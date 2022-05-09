<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mamlzy\PhpAuth\App\Router;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Controller\{HomeController, UserController};
use Mamlzy\PhpAuth\Middleware\{MustLoginMiddleware, MustNotLoginMiddleware};

Database::getConnection('prod');

//! Home
Router::add('GET', '/', HomeController::class, 'index');

//! Auth
Router::add('GET', '/users/register', UserController::class, 'register', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/login', UserController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);

//! Profile
Router::add('GET', '/users/profile', UserController::class, 'updateProfile', [MustLoginMiddleware::class]);
Router::add('POST', '/users/profile', UserController::class, 'postUpdateProfile', [MustLoginMiddleware::class]);

//! Update Password
Router::add('GET', '/users/password', UserController::class, 'updatePassword', [MustLoginMiddleware::class]);
Router::add('POST', '/users/password', UserController::class, 'postUpdatePassword', [MustLoginMiddleware::class]);

Router::run();
