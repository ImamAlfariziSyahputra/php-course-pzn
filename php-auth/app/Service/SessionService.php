<?php

namespace Mamlzy\PhpAuth\Service;

use Mamlzy\PhpAuth\Domain\Session;
use Mamlzy\PhpAuth\Domain\User;
use Mamlzy\PhpAuth\Repository\SessionRepository;
use Mamlzy\PhpAuth\Repository\UserRepository;

class SessionService
{
  public static string $COOKIE_NAME = 'X-MAMLZY-SESSION';

  public function __construct(
    private SessionRepository $sessionRepository,
    private UserRepository $userRepository
  ) {
  }

  public function create(string $userId): Session
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = $userId;

    $this->sessionRepository->save($session);

    setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 24 * 30), '/');

    return $session;
  }

  public function destroy()
  {
    $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
    $this->sessionRepository->deleteById($sessionId);

    //! trick to remove the cookie
    setcookie(self::$COOKIE_NAME, '', 1, '/');
  }

  public function current(): ?User
  {
    $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';

    $session = $this->sessionRepository->findById($sessionId);
    if ($session == null) {
      return null;
    }

    //! return null if user not found
    return $this->userRepository->findById($session->userId);
  }
}
