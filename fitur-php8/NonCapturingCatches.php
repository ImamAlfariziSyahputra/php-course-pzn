<?php

function validate(string $value)
{
  if (trim($value) == '') {
    throw new Exception('Invalid String');
  }
}

try {
  validate('    ');

  //! di PHP 8, tidak wajib membuat variable disamping class "Exception"
} catch (Exception) {
  echo "Invalid" . PHP_EOL;
}
