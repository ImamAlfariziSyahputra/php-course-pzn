<?php

namespace Mamlzy\PhpAuth\Controller;

use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Domain\Session;
use Mamlzy\PhpAuth\Domain\User;
use Mamlzy\PhpAuth\Repository\SessionRepository;
use Mamlzy\PhpAuth\Repository\UserRepository;
use Mamlzy\PhpAuth\Service\SessionService;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
  private HomeController $homeController;
  private UserRepository $userRepository;
  private SessionRepository $sessionRepository;

  public function setUp(): void
  {
    $this->homeController = new HomeController();
    $this->sessionRepository = new SessionRepository(Database::getConnection());
    $this->userRepository = new UserRepository(Database::getConnection());

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();
  }

  public function testGuest()
  {
    $this->homeController->index();

    $this->expectOutputRegex('[Login Management]');
  }

  public function testLoggedIn()
  {
    $user = new User();
    $user->id = 'ahok';
    $user->name = 'Ahok';
    $user->password = 'asd';

    $this->userRepository->save($user);

    $session = new Session();
    $session->id = uniqid();
    $session->userId = $user->id;

    $this->sessionRepository->save($session);

    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

    $this->homeController->index();

    $this->expectOutputRegex('[Hello Ahok]');
  }
}
