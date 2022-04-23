<?php

namespace Helper {

  class InputHelper
  {
    static function input(string $info): string
    {
      echo "$info";
      //! Input
      $result = fgets(STDIN);

      return trim($result);
    }
  }
}
