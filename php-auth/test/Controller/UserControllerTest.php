<?php

namespace Mamlzy\PhpAuth\App {
  function header(string $value)
  {
    echo $value;
  }
}

namespace Mamlzy\PhpAuth\Controller {

  use Mamlzy\PhpAuth\Config\Database;
  use Mamlzy\PhpAuth\Domain\User;
  use Mamlzy\PhpAuth\Repository\UserRepository;
  use PHPUnit\Framework\TestCase;

  class UserControllerTest extends TestCase
  {
    private UserController $userController;
    private UserRepository $userRepository;

    public function setUp(): void
    {
      $this->userController = new UserController();

      $this->userRepository = new UserRepository(Database::getConnection());
      $this->userRepository->deleteAll();

      putenv('mode=test');
    }

    public function testRegister()
    {
      $this->userController->register();

      $this->expectOutputRegex('[Register]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Name]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Register new User]');
    }

    public function testPostRegisterSuccess()
    {
      $_POST['id'] = 'ahok';
      $_POST['name'] = 'Ahok';
      $_POST['password'] = 'asd';

      $this->userController->postRegister();

      $this->expectOutputRegex('[Location: /users/login]');
    }

    public function testPostRegisterValidationError()
    {
      $_POST['id'] = '';
      $_POST['name'] = '';
      $_POST['password'] = '';

      $this->userController->postRegister();

      $this->expectOutputRegex('[Register]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Name]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Register new User]');
      $this->expectOutputRegex('[Id, Name, Password are required!]');
    }

    public function testPostRegisterDuplicate()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = 'asd';

      $this->userRepository->save($user);

      $_POST['id'] = 'ahok';
      $_POST['name'] = 'Ahok';
      $_POST['password'] = 'asd';

      $this->userController->postRegister();

      $this->expectOutputRegex('[Register]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Name]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Register new User]');
      $this->expectOutputRegex('[That User is already exists!]');
    }
  }
}
