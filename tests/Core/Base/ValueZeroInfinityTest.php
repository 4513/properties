<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class ValueZeroInfinityTest
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
class ValueZeroInfinityTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::isInfinite
     * @covers ::isAlmostZero
     *
     * @return void
     */
    public function testInfinity(): void
    {
        $value = new Value(0);
        $value->multiply(INF);

        $this->assertTrue($value->isInfinite());
        $this->assertFalse($value->isAlmostZero());

        $this->expectException(ValueError::class);

        $value->multiply(0);
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::isInfinite
     * @covers ::isAlmostZero
     *
     * @return void
     */
    public function testInfinityDivide(): void
    {
        $value = new Value(0);
        $value->divide(0);

        $this->assertTrue($value->isInfinite());
        $this->assertFalse($value->isAlmostZero());

        $this->expectException(ValueError::class);

        $value->divide(INF);
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::isInfinite
     * @covers ::isAlmostZero
     *
     * @return void
     */
    public function testZeroDivide(): void
    {
        $value = new Value(0);
        $value->divide(INF);

        $this->assertFalse($value->isInfinite());
        $this->assertTrue($value->isAlmostZero());

        $this->expectException(ValueError::class);

        $value->divide(0);
    }

    /**
     * @small
     *
     * @covers ::add
     *
     * @return void
     */
    public function testForbiddenAdd(): void
    {
        $value = new Value(0);
        $value->add(INF);

        $this->expectException(ValueError::class);

        $value->add(0);
    }

    /**
     * @small
     *
     * @covers ::subtract
     *
     * @return void
     */
    public function testForbiddenSubtract(): void
    {
        $value = new Value(0);
        $value->subtract(INF);

        $this->expectException(ValueError::class);

        $value->subtract(0);
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::isInfinite
     * @covers ::getValue
     *
     * @return void
     */
    public function testInfiniteResult(): void
    {
        $value = new Value(1);
        $value->divide(0);
        $this->assertTrue($value->isInfinite());
        $this->assertSame(INF, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::isAlmostZero
     * @covers ::getValue
     *
     * @return void
     */
    public function testZeroResult(): void
    {
        $value = new Value(1);
        $value->divide(INF);
        $this->assertTrue($value->isAlmostZero());
        $this->assertSame(0, $value->getValue());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        Value::$preferInfinity = true;
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        Value::$preferInfinity = false;

        parent::tearDown();
    }
}
