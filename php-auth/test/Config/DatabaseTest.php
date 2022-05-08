<?php

namespace Mamlzy\PhpAuth\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
  public function testGetConnection()
  {
    $connection = Database::getConnection();

    self::assertNotNull($connection);
  }

  public function testGetConnectionSingleton()
  {
    $connecton1 = Database::getConnection();
    $connecton2 = Database::getConnection();

    self::assertSame($connecton1, $connecton2);
  }
}
