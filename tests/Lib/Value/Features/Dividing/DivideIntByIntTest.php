<?php

declare(strict_types=1);

namespace Lib\Value\Features\Dividing;

use Generator;
use MiBo\Properties\Exceptions\DivisionByZeroException;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class DivideIntByIntTest
 *
 * @package Lib\Value\Features\Dividing
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[CoversClass(DivisionByZeroException::class)]
#[Small]
final class DivideIntByIntTest extends TestCase
{
    #[DataProvider('getData')]
    public function testDivide(int $a, int $b, int $expectedResult): void
    {
        $value = new Value($a);

        $value->divide($b);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testDivideReversed(int $a, int $expectedResult, int $b): void
    {
        $value = new Value($a);

        $value->divide($b);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testDivideValue(int $a, int $b, int $expectedResult): void
    {
        $value = new Value($a);

        $value->divide(new Value($b));

        self::assertSame($expectedResult, $value->getValue());
    }

    public function testDivideByZero(): void
    {
        $value = new Value(10);

        self::expectException(DivisionByZeroException::class);

        $value->divide(0);
    }

    public function testDivideByZeroValue(): void
    {
        $value = new Value(10);

        self::expectException(DivisionByZeroException::class);

        $value->divide(new Value(0));
    }

    public function testDivideZero(): void
    {
        $value = new Value(0);

        $value->divide(10);

        self::assertSame(0, $value->getValue());
    }

    public function testDivideByOne(): void
    {
        $value = new Value(10.11);

        $value->divide(1);

        self::assertSame(10.11, $value->getValue());
    }

    public static function getData(): Generator
    {
        foreach (require __DIR__ . '/../../../../Data/multi-two-int.php' as $data) {
            yield $data;
        }
    }
}
