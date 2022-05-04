<?php

namespace Mamlzy\Test;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class MathTest extends TestCase
{
  //! For Simple things
  /**
   * @testWith [10, [5, 5]]
   *  [20, [4, 4, 4, 4, 4]]
   *  [9, [3, 3, 3]]
   *  [0, []]
   *  [2, [2]]
   */
  public function testWith(int $expected, array $values)
  {
    assertEquals($expected, Math::sum($values));
  }

  //! For Complex things
  /**
   * @dataProvider mathSumData
   */
  public function testDataProvider(int $expected, array $values)
  {
    assertEquals($expected, Math::sum($values));
  }

  public function mathSumData(): array
  {
    return [
      [10, [5, 5]],
      [20, [4, 4, 4, 4, 4]],
      [9, [3, 3, 3]],
      [0, []],
      [2, [2]],
    ];
  }
}
