<?php

namespace Mamlzy\PhpMvc\Controller;

use Mamlzy\PhpMvc\App\View;

class AuthController
{
  function login(): void
  {
    View::render('Auth/login');
  }
}
