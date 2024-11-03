<?php

declare(strict_types = 1);

namespace Lib\Value\Features\Precision;

use MiBo\Properties\Exceptions\DivisionByZeroException;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class DoubleDivideTest
 *
 * @package Lib\Value\Features\Precision
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class DoubleDivideTest extends TestCase
{
    #[DataProvider('getData')]
    public function testDivide(int $a, int $b, int $expectedResult): void
    {
        $value = new Value($a, -2, 2);

        $value->divide($b, -2);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testDivideReversed(int $a, int $expectedResult, int $b): void
    {
        $value = new Value($a, -2, 2);

        $value->divide($b, -2);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testDivideValue(int $a, int $b, int $expectedResult): void
    {
        $value = new Value($a, -2, 2);

        $value->divide(new Value($b, -2, 2));

        self::assertSame($expectedResult, $value->getValue());
    }

    public static function getData(): \Generator
    {
        foreach (require __DIR__ . '/../../../../Data/multi-two-int.php' as $data) {
            yield $data;
        }
    }
}
