<?php

declare(strict_types=1);

namespace Lib\Value\Features\Subtracting;

use Generator;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class SubtractFloatFromFloatTest
 *
 * @package Lib\Value\Features\Subtracting
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class SubtractFloatFromFloatTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAdding(float $a, float $b, float $expectedResult): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->subtract($b);

        self::assertEquals($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAdding2(float $a, float $expectedResult, float $b): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->subtract($b);

        self::assertEquals($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingValue(float $a, float $b, float $expectedResult): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->subtract(new Value($b));

        self::assertEquals($expectedResult, $value->getValue());
    }

    public static function getData(): Generator
    {
        foreach (require __DIR__ . '/../../../../Data/add-two-float.php' as $data) {
            yield $data;
        }
    }
}
