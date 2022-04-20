<?php

class ValidationUtil
{
  static function validate(LoginRequest $request)
  {
    if (!isset($request->username)) {
      throw new ValidationException('Username is required.');
    } else if (!isset($request->password)) {
      throw new ValidationException('Password is required.');
    } else if (is_null($request->username)) {
      throw new ValidationException('Username is null.');
    } else if (is_null($request->password)) {
      throw new ValidationException('Password is null.');
    }
  }

  static function validateReflection($request)
  {
    $reflection = new ReflectionClass($request);
    //! Get All "Public" Properties
    $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

    foreach ($properties as $property) {
      if (!$property->isInitialized($request)) {
        throw new ValidationException("$property->name is not set!");
      } else if (is_null($property->getValue($request))) {
        throw new ValidationException("$property->name is null!");
      }
    }
  }
}
