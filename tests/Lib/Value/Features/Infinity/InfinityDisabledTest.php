<?php

declare(strict_types = 1);

namespace Lib\Value\Features\Infinity;

use MiBo\Properties\Exceptions\CalculationWithInfinityException;
use MiBo\Properties\Exceptions\DivisionByZeroException;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class InfinityDisabledTest
 *
 * @package Lib\Value\Features\Infinity
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[CoversClass(CalculationWithInfinityException::class)]
#[CoversClass(DivisionByZeroException::class)]
#[Small]
final class InfinityDisabledTest extends TestCase
{
    public function testCreating(): void
    {
        self::expectException(CalculationWithInfinityException::class);

        new Value(\INF);
    }

    public function testAddInfinity(): void
    {
        $value = new Value(1);

        self::expectException(CalculationWithInfinityException::class);

        $value->add(\INF);
    }

    public function testSubtractInfinity(): void
    {
        $value = new Value(1);

        self::expectException(CalculationWithInfinityException::class);

        $value->subtract(\INF);
    }

    public function testMultiplyInfinity(): void
    {
        $value = new Value(1);

        self::expectException(CalculationWithInfinityException::class);

        $value->multiply(\INF);
    }

    public function testDivideInfinity(): void
    {
        $value = new Value(1);

        self::expectException(CalculationWithInfinityException::class);

        $value->divide(\INF);
    }

    public function testDivideByZero(): void
    {
        $value = new Value(1);

        self::expectException(DivisionByZeroException::class);

        $value->divide(0);
    }
}
