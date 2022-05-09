<?php

namespace Mamlzy\PhpAuth\Controller;

use Mamlzy\PhpAuth\App\View;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Repository\SessionRepository;
use Mamlzy\PhpAuth\Repository\UserRepository;
use Mamlzy\PhpAuth\Service\SessionService;

class HomeController
{
  private SessionService $sessionService;

  public function __construct()
  {
    $connection = Database::getConnection();
    $sessionRepository = new SessionRepository($connection);
    $userRepository = new UserRepository($connection);
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }

  function index()
  {
    $user = $this->sessionService->current();

    if ($user == null) {
      View::render('Home/index', [
        'title' => 'PHP Auth',
      ]);
    } else {
      View::render('Home/dashboard', [
        'title' => 'Dashboard',
        'user' => [
          'name' => $user->name,
        ]
      ]);
    }
  }
}
