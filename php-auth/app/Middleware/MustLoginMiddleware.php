<?php

namespace Mamlzy\PhpAuth\Middleware;

use Mamlzy\PhpAuth\App\View;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Repository\SessionRepository;
use Mamlzy\PhpAuth\Repository\UserRepository;
use Mamlzy\PhpAuth\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
  private SessionService $sessionService;

  public function __construct()
  {
    $sessionRepository = new SessionRepository(Database::getConnection());
    $userRepository = new UserRepository(Database::getConnection());
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }

  function before(): void
  {
    $user = $this->sessionService->current();
    if ($user == null) {
      View::redirect('/users/login');
    }
  }
}
