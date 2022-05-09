<?php

namespace Mamlzy\PhpAuth\Service;

use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Domain\User;
use Mamlzy\PhpAuth\Exception\ValidationException;
use Mamlzy\PhpAuth\Model\UserLoginRequest;
use Mamlzy\PhpAuth\Model\UserRegisterRequest;
use Mamlzy\PhpAuth\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
  private UserService $userService;
  private UserRepository $userRepository;

  public function setUp(): void
  {
    $connection = Database::getConnection();
    $this->userRepository = new UserRepository($connection);
    $this->userService = new UserService($this->userRepository);

    $this->userRepository->deleteAll();
  }

  public function testRegisterSuccess()
  {
    $request = new UserRegisterRequest();
    $request->id = 'ahok';
    $request->name = 'Ahok';
    $request->password = 'asd';

    $response = $this->userService->register($request);

    self::assertEquals($request->id, $response->user->id);
    self::assertEquals($request->name, $response->user->name);
    self::assertNotEquals($request->password, $response->user->password);
    self::assertTrue(password_verify($request->password, $response->user->password));
  }

  public function testRegisterFailed()
  {
    $this->expectException(ValidationException::class);
    $request = new UserRegisterRequest();
    $request->id = '';
    $request->name = '';
    $request->password = '';

    $this->userService->register($request);
  }

  public function testRegisterDuplicate()
  {
    $this->expectException(ValidationException::class);

    $user = new User();
    $user->id = 'ahok';
    $user->name = 'Ahok';
    $user->password = 'asd';

    $this->userRepository->save($user);

    $request = new UserRegisterRequest();
    $request->id = 'ahok';
    $request->name = 'Ahok';
    $request->password = 'asd';

    $this->userService->register($request);
  }

  public function testLoginNotFound()
  {
    $this->expectException(ValidationException::class);

    $request = new UserLoginRequest();
    $request->id = 'ahok';
    $request->password = 'asd';

    $this->userService->login($request);
  }

  public function testLoginWrongPassword()
  {
    $user = new User();
    $user->id = 'ahok';
    $user->name = 'Ahok';
    $user->password = password_hash('asd', PASSWORD_BCRYPT);

    $this->userRepository->save($user);

    $this->expectException(ValidationException::class);

    $request = new UserLoginRequest();
    $request->id = 'ahok';
    $request->name = 'Ahok';
    $request->password = '';

    $this->userService->login($request);
  }

  public function testLoginSuccess()
  {

    $user = new User();
    $user->id = 'ahok';
    $user->name = 'Ahok';
    $user->password = password_hash('asd', PASSWORD_BCRYPT);

    $this->userRepository->save($user);

    $request = new UserLoginRequest();
    $request->id = 'ahok';
    $request->name = 'Ahok';
    $request->password = 'asd';

    $response = $this->userService->login($request);

    self::assertEquals($request->id, $response->user->id);
    self::assertTrue(password_verify($request->password, $response->user->password));
  }
}
