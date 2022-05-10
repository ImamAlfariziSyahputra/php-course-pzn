<?php

namespace Mamlzy\PhpLogging\Test;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ResetTest extends TestCase
{
  public function testReset()
  {
    $logger = new Logger(ResetTest::class);
    $logger->pushHandler(new StreamHandler('php://stderr'));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));
    $logger->pushProcessor(new GitProcessor());
    $logger->pushProcessor(new MemoryUsageProcessor());
    $logger->pushProcessor(new HostnameProcessor());

    //! Setiap Kelipatan 100, Reset Logger! (agar aman untuk memory)
    for ($i = 0; $i < 1000; $i++) {
      $logger->info("Perulangan Ke-$i");
      if ($i % 100 == 0) {
        $logger->reset();
      }
    }

    self::assertNotNull($logger);
  }
}
