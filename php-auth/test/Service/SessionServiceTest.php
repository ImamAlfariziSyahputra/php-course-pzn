<?php

namespace Mamlzy\PhpAuth\Service;

require_once __DIR__ . '/../Helper/helper.php';

use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Domain\Session;
use Mamlzy\PhpAuth\Domain\User;
use Mamlzy\PhpAuth\Repository\SessionRepository;
use Mamlzy\PhpAuth\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class SessionServiceTest extends TestCase
{
  private SessionService $sessionService;
  private SessionRepository $sessionRepository;
  private UserRepository $userRepository;

  public function setUp(): void
  {
    $this->sessionRepository = new SessionRepository(Database::getConnection());
    $this->userRepository = new UserRepository(Database::getConnection());
    $this->sessionService = new SessionService($this->sessionRepository, $this->userRepository);

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();

    $user = new User();
    $user->id = 'ahok';
    $user->name = 'Ahok';
    $user->password = 'asd';

    $this->userRepository->save($user);
  }

  public function testCreate()
  {
    $session = $this->sessionService->create('ahok');

    $this->expectOutputRegex("[X-MAMLZY-SESSION: $session->id]");

    $result = $this->sessionRepository->findById($session->id);

    self::assertEquals($session->id, $result->id);
  }

  public function testDestroy()
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = 'ahok';

    $this->sessionRepository->save($session);

    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

    $this->sessionService->destroy();

    $this->expectOutputRegex('[X-MAMLZY-SESSION: ]');

    $result = $this->sessionRepository->findById($session->id);

    self::assertNull($result);
  }

  public function testCurrent()
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = 'ahok';

    $this->sessionRepository->save($session);

    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

    $user = $this->sessionService->current();

    self::assertEquals($session->userId, $user->id);
  }
}
