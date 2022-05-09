<?php

namespace Mamlzy\PhpAuth\Repository;

use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Domain\Session;
use Mamlzy\PhpAuth\Domain\User;
use PHPUnit\Framework\TestCase;

class SessionRepositoryTest extends TestCase
{
  private SessionRepository $sessionRepository;

  public function setUp(): void
  {
    $this->userRepository = new UserRepository(Database::getConnection());
    $this->sessionRepository = new SessionRepository(Database::getConnection());

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();

    $user = new User();
    $user->id = 'ahok';
    $user->name = 'Ahok';
    $user->password = 'asd';

    $this->userRepository->save($user);
  }

  public function testSaveSuccess()
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = 'ahok';

    $this->sessionRepository->save($session);

    $result = $this->sessionRepository->findById($session->id);

    self::assertEquals($session->id, $result->id);
    self::assertEquals($session->userId, $result->userId);
  }

  public function testDeleteByIdSuccess()
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = 'ahok';

    $this->sessionRepository->save($session);

    $result = $this->sessionRepository->findById($session->id);

    self::assertEquals($session->id, $result->id);
    self::assertEquals($session->userId, $result->userId);

    $this->sessionRepository->deleteById($session->id);

    $result = $this->sessionRepository->findById($session->id);

    self::assertNull($result);
  }

  public function testDeleteByIdNotFound()
  {
    $result = $this->sessionRepository->findById('notfound');

    self::assertNull($result);
  }
}
