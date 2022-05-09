<?php

namespace Mamlzy\PhpAuth\Controller;

use Mamlzy\PhpAuth\App\View;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Exception\ValidationException;
use Mamlzy\PhpAuth\Model\UserLoginRequest;
use Mamlzy\PhpAuth\Model\UserRegisterRequest;
use Mamlzy\PhpAuth\Repository\UserRepository;
use Mamlzy\PhpAuth\Service\UserService;

class UserController
{
  private UserService $userService;

  public function __construct()
  {
    $connection = Database::getConnection();
    $userRepository = new UserRepository($connection);
    $this->userService = new UserService($userRepository);
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
      $this->userService->login($request);

      View::redirect('/');
    } catch (ValidationException $e) {
      View::render("User/login", [
        "title" => 'Login Page',
        "error" => $e->getMessage()
      ]);
    }
  }
}
