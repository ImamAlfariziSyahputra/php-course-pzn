<?php

namespace Mamlzy\PhpAuth\Controller;

use Mamlzy\PhpAuth\App\View;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Exception\ValidationException;
use Mamlzy\PhpAuth\Model\UserLoginRequest;
use Mamlzy\PhpAuth\Model\UserPasswordUpdateRequest;
use Mamlzy\PhpAuth\Model\UserProfileUpdateRequest;
use Mamlzy\PhpAuth\Model\UserRegisterRequest;
use Mamlzy\PhpAuth\Repository\SessionRepository;
use Mamlzy\PhpAuth\Repository\UserRepository;
use Mamlzy\PhpAuth\Service\SessionService;
use Mamlzy\PhpAuth\Service\UserService;

class UserController
{
  private UserService $userService;
  private SessionService $sessionService;

  public function __construct()
  {
    $connection = Database::getConnection();
    $userRepository = new UserRepository($connection);
    $this->userService = new UserService($userRepository);

    $sessionRepository = new SessionRepository($connection);
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }

  public function register()
  {
    View::render("User/register", [
      "title" => 'Register new User'
    ]);
  }

  public function postRegister()
  {
    $request = new UserRegisterRequest();
    $request->id = $_POST['id'];
    $request->name = $_POST['name'];
    $request->password = $_POST['password'];

    try {
      $this->userService->register($request);

      //! Redirect ke halaman login
      View::redirect('/users/login');
    } catch (ValidationException $e) {
      View::render("User/register", [
        "title" => 'Register new User',
        "error" => $e->getMessage()
      ]);
    }
  }

  public function login()
  {
    View::render("User/login", [
      "title" => 'Login Page'
    ]);
  }

  public function postLogin()
  {
    $request = new UserLoginRequest();
    $request->id = $_POST['id'];
    $request->password = $_POST['password'];

    try {
      $response = $this->userService->login($request);
      $this->sessionService->create($response->user->id); //! Create session

      View::redirect('/');
    } catch (ValidationException $e) {
      View::render("User/login", [
        "title" => 'Login Page',
        "error" => $e->getMessage()
      ]);
    }
  }

  public function logout()
  {
    $this->sessionService->destroy();

    View::redirect('/');
  }

  public function updateProfile()
  {
    $user = $this->sessionService->current();

    View::render('User/profile', [
      "title" => 'Update User Profile',
      'user' => [
        'id' => $user->id,
        'name' => $user->name
      ]
    ]);
  }

  public function postUpdateProfile()
  {
    $user = $this->sessionService->current();

    $request = new UserProfileUpdateRequest();
    $request->id = $user->id;
    $request->name = $_POST['name'];

    try {
      $this->userService->updateProfile($request);

      View::redirect('/');
    } catch (ValidationException $e) {
      View::render('User/profile', [
        "title" => 'Update User Profile',
        'error' => $e->getMessage(),
        'user' => [
          'id' => $user->id,
          'name' => $_POST['name']
        ]
      ]);
    }
  }

  public function updatePassword()
  {
    $user = $this->sessionService->current();

    View::render('User/password', [
      'title' => 'Update User Password',
      'user' => [
        'id' => $user->id
      ]
    ]);
  }

  public function postUpdatePassword()
  {
    $user = $this->sessionService->current();

    $request = new UserPasswordUpdateRequest();
    $request->id = $user->id;
    $request->oldPassword = $_POST['oldPassword'];
    $request->newPassword = $_POST['newPassword'];

    try {
      $this->userService->updatePassword($request);

      View::redirect('/');
    } catch (ValidationException $e) {
      View::render('User/password', [
        'title' => 'Update User Password',
        'error' => $e->getMessage(),
        'user' => [
          'id' => $user->id
        ]
      ]);
    }
  }
}
