<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Precision;

use MiBo\Properties\Value;
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
 *
 * @coversDefaultClass \MiBo\Properties\Value
 */
class ValuePrecisionTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::add
     * @covers ::divide
     * @covers ::multiply
     * @covers ::getValue
     * @covers ::hasPrecision
     * @covers ::preparePrecision
     *
     * @return void
     */
    public function testPrecisionPositiveOrZero(): void
    {
        $value = new Value(10, 0, 0);

        $value->add(1);

        $this->assertSame(11, $value->getValue());

        $value->add(0.1, 1);

        $this->assertSame(12, $value->getValue());

        $value->add(1, -1);

        $this->assertSame(12, $value->getValue());

        $value->add(5, -1);

        $this->assertSame(13, $value->getValue());

        $value->subtract(0.5);

        $this->assertSame(12, $value->getValue());

        $value->subtract(0.2);

        $this->assertSame(12, $value->getValue());

        $value = new Value(10, 0, -1);

        $this->assertSame(10, $value->getValue());

        $value->add(1);

        $this->assertSame(10, $value->getValue());

        $value->divide(5);

        $this->assertSame(0, $value->getValue());

        $value->add(1, 1);

        $this->assertSame(10, $value->getValue());

        $value->multiply(11, -1);

        $this->assertSame(10, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::add
     * @covers ::getValue
     * @covers ::hasPrecision
     * @covers ::preparePrecision
     *
     * @return void
     */
    public function testPrecisionDecimal(): void
    {
        $value = new Value(10, 0, 2);

        $value->add(1);
        $value->divide(5);

        $this->assertSame(2.2, $value->getValue());

        $value->add(11, -2);

        $this->assertSame(2.31, $value->getValue());

        $value->multiply(2, -1);

        $this->assertSame(0.46, $value->getValue());

        $value->divide(5, -1);

        $this->assertSame(0.92, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::add
     * @covers ::divide
     * @covers ::preparePrecision
     *
     * @return void
     */
    public function testNoPrecisionSet(): void
    {
        $value = new Value(10);

        $value->add(1);
        $value->divide(5);

        $this->assertSame(2.2, $value->getValue());
    }
}
