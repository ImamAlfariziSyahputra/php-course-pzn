<?php

namespace Mamlzy\PhpLogging\Controller;

use Mamlzy\PhpLogging\App\View;

class AuthController
{
  function login(): void
  {
    View::render('Auth/login');
  }
}
