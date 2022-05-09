<?php

namespace Mamlzy\PhpAuth\Controller {

  require_once __DIR__ . '/../Helper/helper.php';

  use Mamlzy\PhpAuth\Config\Database;
  use Mamlzy\PhpAuth\Domain\Session;
  use Mamlzy\PhpAuth\Domain\User;
  use Mamlzy\PhpAuth\Exception\ValidationException;
  use Mamlzy\PhpAuth\Repository\SessionRepository;
  use Mamlzy\PhpAuth\Repository\UserRepository;
  use Mamlzy\PhpAuth\Service\SessionService;
  use PHPUnit\Framework\TestCase;

  class UserControllerTest extends TestCase
  {
    private UserController $userController;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    public function setUp(): void
    {
      $this->userController = new UserController();

      $this->sessionRepository = new SessionRepository(Database::getConnection());
      $this->sessionRepository->deleteAll();

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

    public function testLogin() //! to render login page
    {
      $this->userController->login();

      $this->expectOutputRegex('[Login Page]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Sign On]');
    }

    public function testLoginSuccess()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $_POST['id'] = 'ahok';
      $_POST['name'] = 'Ahok';
      $_POST['password'] = 'asd';

      $this->userController->postLogin();

      $this->expectOutputRegex('[Location: /]');
      $this->expectOutputRegex('[X-MAMLZY-SESSION: ]');
    }

    public function testLoginValidationError()
    {
      $_POST['id'] = '';
      $_POST['password'] = '';

      $this->userController->postLogin();

      $this->expectOutputRegex('[Login Page]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Sign On]');
      $this->expectOutputRegex('[Id, Password are required!]');
    }

    public function testLoginUserNotFound()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $_POST['id'] = 'tony';
      $_POST['password'] = 'asd';

      $this->userController->postLogin();

      $this->expectOutputRegex('[Login Page]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Sign On]');
      $this->expectOutputRegex('[Id or Password is wrong!]');
    }

    public function testLoginUserWrongPassword()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $_POST['id'] = 'ahok';
      $_POST['password'] = 'abc';

      $this->userController->postLogin();

      $this->expectOutputRegex('[Login Page]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Sign On]');
      $this->expectOutputRegex('[Id or Password is wrong!]');
    }

    public function testLogout()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->logout();

      $this->expectOutputRegex('[Location: /]');
      $this->expectOutputRegex('[X-MAMLZY-SESSION: ]');
    }

    //! Update Profile page
    public function testUpdateProfile()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->updateProfile();

      $this->expectOutputRegex('[Profile]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[ahok]');
      $this->expectOutputRegex('[Name]');
      $this->expectOutputRegex('[Ahok]');
    }

    //! Update Profile page
    public function testPostUpdateProfileSuccess()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['name'] = 'Basuki';

      $this->userController->postUpdateProfile();

      $this->expectOutputRegex('[Location: /]');

      $result = $this->userRepository->findById($user->id);

      self::assertEquals('Basuki', $result->name);
    }

    //! Update Profile page
    public function testPostUpdateProfileValidationError()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['name'] = '';

      $this->userController->postUpdateProfile();

      $this->expectOutputRegex('[Profile]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[ahok]');
      $this->expectOutputRegex('[Name]');
      $this->expectOutputRegex('[Id, Name are required!]');
    }

    //! Update Password page
    public function testUpdatePassword()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->updatePassword();

      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[ahok]');
    }

    public function testPostUpdatePasswordSuccess()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['oldPassword'] = 'asd';
      $_POST['newPassword'] = '123';

      $this->userController->postUpdatePassword();

      $this->expectOutputRegex('[Location: /]');

      $result = $this->userRepository->findById($user->id);

      self::assertTrue(password_verify($_POST['newPassword'], $result->password));
    }

    public function testPostUpdatePasswordValidationError()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['oldPassword'] = '';
      $_POST['newPassword'] = '';

      $this->userController->postUpdatePassword();

      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[ahok]');
      $this->expectOutputRegex('[Id, Old Password, New Password are required!]');
    }

    public function testPostUpdatePasswordWrongOldPassword()
    {
      $user = new User();
      $user->id = 'ahok';
      $user->name = 'Ahok';
      $user->password = password_hash('asd', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;

      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['oldPassword'] = 'salah';
      $_POST['newPassword'] = '123';

      $this->userController->postUpdatePassword();

      $this->expectOutputRegex('[Password]');
      $this->expectOutputRegex('[Id]');
      $this->expectOutputRegex('[ahok]');
      $this->expectOutputRegex('[Old Password is wrong!]');
    }
  }
}
