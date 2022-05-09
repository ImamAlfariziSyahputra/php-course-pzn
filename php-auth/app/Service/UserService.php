<?php

namespace Mamlzy\PhpAuth\Service;

use Exception;
use Mamlzy\PhpAuth\Config\Database;
use Mamlzy\PhpAuth\Domain\User;
use Mamlzy\PhpAuth\Exception\ValidationException;
use Mamlzy\PhpAuth\Model\UserLoginRequest;
use Mamlzy\PhpAuth\Model\UserLoginResponse;
use Mamlzy\PhpAuth\Model\UserPasswordUpdateRequest;
use Mamlzy\PhpAuth\Model\UserPasswordUpdateResponse;
use Mamlzy\PhpAuth\Model\UserProfileUpdateRequest;
use Mamlzy\PhpAuth\Model\UserProfileUpdateResponse;
use Mamlzy\PhpAuth\Model\UserRegisterRequest;
use Mamlzy\PhpAuth\Model\UserRegisterResponse;
use Mamlzy\PhpAuth\Repository\UserRepository;

class UserService
{
  public function __construct(private UserRepository $userRepository)
  {
  }

  public function register(UserRegisterRequest $request): userRegisterResponse
  {
    $this->validateUserRegistrationRequest($request);

    $user = $this->userRepository->findById($request->id);
    //! User must be "unique"
    if ($user != null) {
      throw new ValidationException("That User is already exists!");
    }

    try {
      Database::beginTransaction();
      $user = new User();
      $user->id = $request->id;
      $user->name = $request->name;
      $user->password = password_hash($request->password, PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $response = new UserRegisterResponse();
      $response->user = $user;

      Database::commitTransaction();

      return $response;
    } catch (Exception $e) {
      Database::rollbackTransaction();
      throw $e;
    }
  }

  private function validateUserRegistrationRequest(UserRegisterRequest $request)
  {
    if ($request->id == null || $request->name == null || $request->password == null || trim($request->id == '') || trim($request->name == '') || trim($request->password == '')) {
      throw new ValidationException("Id, Name, Password are required!");
    }
  }

  public function login(UserLoginRequest $request): UserLoginResponse
  {
    $this->validateUserLoginRequest($request);

    $user = $this->userRepository->findById($request->id);
    if ($user == null) {
      throw new ValidationException("Id or Password is wrong!");
    }

    if (password_verify($request->password, $user->password)) {
      $response = new UserLoginResponse();
      $response->user = $user;

      return $response;
    } else {
      throw new ValidationException("Id or Password is wrong!");
    }
  }

  private function validateUserLoginRequest(UserLoginRequest $request)
  {
    if ($request->id == null || $request->password == null || trim($request->id == '') || trim($request->password == '')) {
      throw new ValidationException("Id, Password are required!");
    }
  }

  public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse
  {
    $this->validateUserProfileUpdateRequest($request);

    try {
      Database::beginTransaction();

      $user = $this->userRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException('User is not found!');
      }

      $user->name = $request->name;

      $this->userRepository->update($user);

      Database::commitTransaction();

      $response = new UserProfileUpdateResponse();
      $response->user = $user;

      return $response;
    } catch (Exception $e) {
      Database::rollbackTransaction();
      throw $e;
    }
  }

  private function validateUserProfileUpdateRequest(UserProfileUpdateRequest $request)
  {
    if ($request->id == null || $request->name == null || trim($request->id == '') || trim($request->name == '')) {
      throw new ValidationException("Id, Name are required!");
    }
  }

  public function updatePassword(UserPasswordUpdateRequest $request): UserPasswordUpdateResponse
  {
    $this->validateUserPasswordUpdateRequest($request);

    try {
      Database::beginTransaction();

      $user = $this->userRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException("User is not found!");
      }

      if (!password_verify($request->oldPassword, $user->password)) {
        throw new ValidationException("Old Password is wrong!");
      }

      $user->password = password_hash($request->newPassword, PASSWORD_BCRYPT);
      $this->userRepository->update($user);

      Database::commitTransaction();

      $response = new UserPasswordUpdateResponse();
      $response->user = $user;

      return $response;
    } catch (Exception $e) {
      Database::rollbackTransaction();
      throw $e;
    }
  }

  private function validateUserPasswordUpdateRequest(UserPasswordUpdateRequest $request)
  {
    if ($request->id == null || $request->newPassword == null || $request->newPassword == null || trim($request->id == '') || trim($request->oldPassword == '') || trim($request->newPassword == '')) {
      throw new ValidationException("Id, Old Password, New Password are required!");
    }
  }
}
