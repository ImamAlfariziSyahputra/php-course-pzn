<?php

namespace Mamlzy\PhpLogging\Test;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
  public function testLogger()
  {
    $logger = new Logger('Mamlzy');

    self::assertNotNull($logger);
  }

  public function testLoggerWithName()
  {
    $logger = new Logger(LoggerTest::class);

    self::assertNotNull($logger);
  }
}
