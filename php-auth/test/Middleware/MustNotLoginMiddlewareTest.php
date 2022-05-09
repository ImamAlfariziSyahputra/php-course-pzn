<?php

namespace Mamlzy\PhpAuth\Middleware {

  require_once __DIR__ . '/../Helper/helper.php';

  use Mamlzy\PhpAuth\Config\Database;
  use Mamlzy\PhpAuth\Domain\Session;
  use Mamlzy\PhpAuth\Domain\User;
  use Mamlzy\PhpAuth\Repository\SessionRepository;
  use Mamlzy\PhpAuth\Repository\UserRepository;
  use Mamlzy\PhpAuth\Service\SessionService;
  use PHPUnit\Framework\TestCase;

  class MustNotLoginMiddlewareTest extends TestCase
  {
    private MustNotLoginMiddleware $middleware;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    public function setUp(): void
    {
      $this->middleware = new MustNotLoginMiddleware();
      putenv("mode=test");

      $this->userRepository = new UserRepository(Database::getConnection());
      $this->sessionRepository = new SessionRepository(Database::getConnection());

      $this->sessionRepository->deleteAll();
      $this->userRepository->deleteAll();
    }

    public function testBefore()
    {
      $this->middleware->before();

      $this->expectOutputString('');
    }

    public function testBeforeLoginUser()
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

      $this->middleware->before();

      $this->expectOutputRegex('[Location: /]');
    }
  }
}
