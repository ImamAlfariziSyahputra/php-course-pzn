<?php

namespace Mamlzy\PhpLogging\Test;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
  public function testContext()
  {
    $logger = new Logger(ContextTest::class);
    $logger->pushHandler(new StreamHandler('php://stderr'));;

    $logger->info('Request user login', ['username' => 'ahok']);
    $logger->info('Success login', ['username' => 'ahok']);

    self::assertNotNull($logger);
  }
}
