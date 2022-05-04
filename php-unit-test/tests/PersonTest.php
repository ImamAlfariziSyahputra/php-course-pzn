<?php

namespace Mamlzy\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
  private Person $person;

  protected function setUp(): void
  {
    // $this->person = new Person('Tony');
  }

  /**
   * @before
   */
  protected function createPerson()
  {
    $this->person = new Person('Tony');
  }

  public function testSuccess()
  {
    self::assertEquals('Hello Ahok, My name is Tony', $this->person->sayHello('Ahok'));
  }

  public function testException()
  {
    $this->expectException(Exception::class);
    $this->person->sayHello(null);
  }

  public function testOutput()
  {
    $this->expectOutputString("Good Bye Ahok..." . PHP_EOL);
    $this->person->sayGoodbye('Ahok');
  }
}
