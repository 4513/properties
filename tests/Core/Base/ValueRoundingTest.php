<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueRoundingTest
 *
 * @package MiBo\Properties\Tests\Base
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
class ValueRoundingTest extends TestCase
{
    public function testRoundResult(): void
    {
        $value1 = new Value(10, -10);
        $value2 = new Value(5, -9);
        $value3 = new Value(1, -16);

        $value1->divide($value2)->subtract($value3);

        self::assertSame(0.2, $value1->getValue());
        self::assertSame(2.0, $value1->getValue(-1));
        self::assertSame(0, $value1->getValue(0, 0));
        self::assertSame(
            (10*10**-10)/(5*10**-9)-(10**-16),
            $value1->getValue(0, PHP_FLOAT_DIG + 1)
        );
    }

    public function testThatRoundToIntReturnsInt(): void
    {
        $value = new Value(10, -10);
        $value->divide(5, -9);

        self::assertIsInt($value->getValue(0, 0));
    }

    public function testThatIntIsReturnedIfPossible(): void
    {
        $value = new Value(10);
        $value->divide(5);

        self::assertIsInt($value->getValue());
    }
}
