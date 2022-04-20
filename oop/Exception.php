<?php

require_once __DIR__ . '/Exception/ValidationException.php';
require_once __DIR__ . '/Data/LoginRequest.php';
require_once __DIR__ . '/Helper/Validation.php';

$loginRequest = new LoginRequest();

$loginRequest->username = '';
$loginRequest->password = 'asd';

try {
  validationLoginRequest($loginRequest);

  echo 'Validation Success' . PHP_EOL;
} catch (Exception | ValidationException $exception) {
  echo "Error: {$exception->getMessage()}" . PHP_EOL;

  //! getTrace() => Untuk Tracing Error di File Apa dan Line Berapa.
  var_dump($exception->getTrace());
  //! Sama tapi formatnya "string"
  echo $exception->getTraceAsString() . PHP_EOL;
} finally {
  echo 'Baik "Error" atau "Success", "finally" tetap jalan';
}
