<?php

namespace Mamlzy\PhpLogging\Controller;

use Mamlzy\PhpLogging\App\View;

class HomeController
{
  function index(): void
  {
    $model = [
      "title" => "Belajar PHP Logging",
      "content" => "Selamat datang di Index Page"
    ];

    View::render('Home/index', $model);
  }

  function hello(): void
  {
    echo 'HomeController.hello()';
  }

  function world(): void
  {
    echo 'HomeController.world()';
  }

  function login(): void
  {
    $request = [
      "username" => $_POST['username'],
      "password" => $_POST['password'],
    ];
  }
}
