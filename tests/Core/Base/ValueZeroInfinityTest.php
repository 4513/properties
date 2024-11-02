<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Exceptions\CalculationWithInfinityException;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
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
 */
#[CoversClass(Value::class)]
#[Small]
class ValueZeroInfinityTest extends TestCase
{
    public function testInfinity(): void
    {
        $value = new Value(0);
        $value->multiply(INF);

        self::assertTrue($value->isInfinite());
        self::assertFalse($value->isAlmostZero());

        $this->expectException(CalculationWithInfinityException::class);

        $value->multiply(0);
    }

    public function testInfinityDivide(): void
    {
        $value = new Value(0);
        $value->divide(0);

        self::assertTrue($value->isInfinite());
        self::assertFalse($value->isAlmostZero());

        $this->expectException(CalculationWithInfinityException::class);

        $value->divide(INF);
    }

    public function testZeroDivide(): void
    {
        $value = new Value(0);
        $value->divide(INF);

        self::assertFalse($value->isInfinite());
        self::assertTrue($value->isAlmostZero());

        $this->expectException(CalculationWithInfinityException::class);

        $value->divide(0);
    }

    public function testForbiddenAdd(): void
    {
        $value = new Value(0);
        $value->add(INF);

        $this->expectException(CalculationWithInfinityException::class);

        $value->add(0);
    }

    public function testForbiddenSubtract(): void
    {
        $value = new Value(0);
        $value->subtract(INF);

        $this->expectException(CalculationWithInfinityException::class);

        $value->subtract(0);
    }

    public function testInfiniteResult(): void
    {
        $value = new Value(1);
        $value->divide(0);
        self::assertTrue($value->isInfinite());
        self::assertSame(INF, $value->getValue());
    }

    public function testZeroResult(): void
    {
        $value = new Value(1);
        $value->divide(INF);
        self::assertTrue($value->isAlmostZero());
        self::assertSame(0, $value->getValue());
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
