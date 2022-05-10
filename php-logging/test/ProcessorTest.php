<?php

namespace Mamlzy\PhpLogging\Test;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
  public function testProcessor()
  {
    $logger = new Logger(ProcessorTest::class);
    $logger->pushHandler(new StreamHandler('php://stderr'));
    $logger->pushProcessor(new GitProcessor());
    $logger->pushProcessor(new MemoryUsageProcessor());
    $logger->pushProcessor(new HostnameProcessor());
    $logger->pushProcessor(function ($record) {
      $record['extra']['mamlzy'] = [
        "app" => 'Belajar PHP Logging',
        'author' => 'Imam Alfarizi'
      ];

      return $record;
    });

    $logger->info('Hello World', ['username' => 'ahok']);
    $logger->info('Hello World kedua');
    $logger->info('Hello World ketiga');

    self::assertNotNull($logger);
  }
}
