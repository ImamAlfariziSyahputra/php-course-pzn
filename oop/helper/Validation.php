<?php

//* Validation Exception => Custom Class turunan Exception Class
//* Exception => Bawaan Exception Class


function validationLoginRequest(LoginRequest $request)
{
  if (!isset($request->username)) {
    throw new ValidationException('Username is required');
  } else if (!isset($request->password)) {
    throw new ValidationException('Password is required');
  } else if (trim($request->username) == '') {
    throw new Exception('Username is empty');
  } else if (trim($request->password) == '') {
    throw new Exception('Password is empty');
  }
}
