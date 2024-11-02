<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Precision;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValuePrecisionTest
 *
 * @package MiBo\Properties\Tests\Core\Precision
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
class ValuePrecisionTest extends TestCase
{
    public function testPrecisionPositiveOrZero(): void
    {
        $value = new Value(10, 0, 0);

        $value->add(1);

        self::assertSame(11, $value->getValue());

        $value->add(0.1, 1);

        self::assertSame(12, $value->getValue());

        $value->add(1, -1);

        self::assertSame(12, $value->getValue());

        $value->add(5, -1);

        self::assertSame(13, $value->getValue());

        $value->subtract(0.5);

        self::assertSame(12, $value->getValue());

        $value->subtract(0.2);

        self::assertSame(12, $value->getValue());

        $value = new Value(10, 0, -1);

        self::assertSame(10, $value->getValue());

        $value->add(1);

        self::assertSame(10, $value->getValue());

        $value->divide(5);

        self::assertSame(0, $value->getValue());

        $value->add(1, 1);

        self::assertSame(10, $value->getValue());

        $value->multiply(11, -1);

        self::assertSame(10, $value->getValue());
    }

    public function testPrecisionDecimal(): void
    {
        $value = new Value(10, 0, 2);

        $value->add(1);
        $value->divide(5);

        self::assertSame(2.2, $value->getValue());

        $value->add(11, -2);

        self::assertSame(2.31, $value->getValue());

        $value->multiply(2, -1);

        self::assertSame(0.46, $value->getValue());

        $value->divide(5, -1);

        self::assertSame(0.92, $value->getValue());
    }

    public function testNoPrecisionSet(): void
    {
        $value = new Value(10);

        $value->add(1);
        $value->divide(5);

        self::assertSame(2.2, $value->getValue());
    }
}
