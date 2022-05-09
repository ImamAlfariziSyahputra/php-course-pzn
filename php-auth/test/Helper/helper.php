<?php

namespace Mamlzy\PhpAuth\App {
  function header(string $value)
  {
    echo $value;
  }
}

namespace Mamlzy\PhpAuth\Service {
  function setcookie(string $name, string $value)
  {
    echo "$name: $value";
  }
}
