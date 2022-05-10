<?php

namespace Mamlzy\PhpLogging\Middleware;

class AuthMiddleware implements Middleware
{
  function before(): void
  {
    session_start();

    if (empty($_SESSION['user'])) {
      header('Location: /login');
      exit();
    }
  }
}
