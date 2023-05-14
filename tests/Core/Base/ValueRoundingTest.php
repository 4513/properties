<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
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
 *
 * @coversDefaultClass \MiBo\Properties\Value
 */
class ValueRoundingTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::getValue
     *
     * @return void
     */
    public function testRoundResult(): void
    {
        $value1 = new Value(10, -10);
        $value2 = new Value(5, -9);
        $value3 = new Value(1, -16);

        $value1->divide($value2)->subtract($value3);

        $this->assertSame(0.2, $value1->getValue());
        $this->assertSame(2.0, $value1->getValue(-1));
        $this->assertSame(0, $value1->getValue(0, 0));
        $this->assertSame(
            (10*10**-10)/(5*10**-9)-(10**-16),
            $value1->getValue(0, PHP_FLOAT_DIG + 1)
        );
    }

    /**
     * @small
     *
     * @covers ::getValue
     *
     * @return void
     */
    public function testThatRoundToIntReturnsInt(): void
    {
        $value = new Value(10, -10);
        $value->divide(5, -9);

        $this->assertIsInt($value->getValue(0, 0));
    }

    /**
     * @small
     *
     * @covers ::getValue
     *
     * @return void
     */
    public function testThatIntIsReturnedIfPossible(): void
    {
        $value = new Value(10);
        $value->divide(5);

        $this->assertIsInt($value->getValue());
    }
}
