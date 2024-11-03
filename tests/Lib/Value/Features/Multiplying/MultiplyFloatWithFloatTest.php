<?php

declare(strict_types=1);

namespace Lib\Value\Features\Multiplying;

use Generator;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class MultiplyFloatWithFloatTest
 *
 * @package Lib\Value\Features\Multiplying
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class MultiplyFloatWithFloatTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAdding(int|float $expectedResult, float $a, float $b): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->multiply($b);

        self::assertEquals(round($expectedResult, 5), $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingValue(int|float $expectedResult, float $a, float $b): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->multiply(new Value($b));

        self::assertEquals(round($expectedResult, 5), $value->getValue());
    }

    public function testMultiplyByZero(): void
    {
        $value = new Value(10.5);

        $value->multiply(0);

        self::assertSame(0, $value->getValue());
    }

    public function testMultiplyByZeroValue(): void
    {
        $value = new Value(10.5);

        $value->multiply(new Value(0.0));

        self::assertSame(0, $value->getValue());
    }

    public function testMultiplyZero(): void
    {
        $value = new Value(0);

        $value->multiply(10.5);

        self::assertSame(0, $value->getValue());
    }

    public function testMultiplyZeroByValue(): void
    {
        $value = new Value(0);

        $value->multiply(new Value(10.5));

        self::assertSame(0, $value->getValue());
    }

    public static function getData(): Generator
    {
        foreach (require __DIR__ . '/../../../../Data/multi-two-float.php' as $data) {
            yield $data;
        }
    }
}
