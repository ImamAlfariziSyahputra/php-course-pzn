<?php

namespace Mamlzy\Test;

use PHPUnit\Framework\{TestCase, Assert};

use function PHPUnit\Framework\assertEquals;

class CounterTest extends TestCase
{
  private Counter $counter;

  protected function setUp(): void
  {
    $this->counter = new Counter();

    echo "Membuat Object Counter" . PHP_EOL;
  }

  public function testIncrement()
  {
    self::markTestSkipped('Skip dulu...');
    self::assertEquals(0, $this->counter->getCounter());
    // TODO not completed
    self::markTestIncomplete("Todo is increment");
  }

  /**
   * @test
   */
  public function counter()
  {
    $this->counter->increment();

    self::assertEquals(1, $this->counter->getCounter());
  }

  public function testFirst(): Counter
  {
    $this->counter->increment();

    self::assertEquals(1, $this->counter->getCounter());

    return $this->counter;
  }

  /**
   * @depends testFirst
   */
  public function testSecond(Counter $counter): void
  {
    $counter->increment();

    self::assertEquals(2, $counter->getCounter());
  }

  public function tearDown(): void
  {
    echo "Tear Down executed..." . PHP_EOL;
  }

  /**
   * @after
   */
  public function after()
  {
    echo "After executed..." . PHP_EOL;
  }

  /**
   * @requires OSFAMILY Darwin
   * @requires PHP >= 8
   */
  public function testOnlyMac()
  {
    self::assertTrue(true, 'Only work in Mac');
  }

  /**
   * @requires OSFAMILY Windows
   * @requires PHP >= 8
   */
  public function testOnlyWindows()
  {
    echo "Windows Only..." . PHP_EOL;
    self::assertTrue(true, 'Only work in Windows');
  }
}
