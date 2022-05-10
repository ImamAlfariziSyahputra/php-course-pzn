<?php

namespace Mamlzy\PhpLogging;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{

  public function testRegex()
  {
    $path = '/products/123/categories/abcde';

    $pattern = "#^/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)$#";

    $result = preg_match($pattern, $path, $matches);

    self::assertEquals(1, $result);

    array_shift($matches); //! Remove First Index in Array

    var_dump($matches);
  }
}
