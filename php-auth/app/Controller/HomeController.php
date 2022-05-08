<?php

namespace Mamlzy\PhpAuth\Controller;

use Mamlzy\PhpAuth\App\View;

class HomeController
{

  function index()
  {
    View::render('Home/index', [
      'title' => 'PHP Auth',
    ]);
  }
}
