<?php

declare(strict_types = 1);

namespace Lib\Value\Features\Infinity;

use MiBo\Properties\Exceptions\CalculationWithInfinityException;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class InfinityEnabledTest
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
#[Small]
final class InfinityEnabledTest extends TestCase
{
    public function testCreate(): void
    {
        self::expectNotToPerformAssertions();

        new Value(\INF);
    }

    public function testGetValueOfPosInf(): void
    {
        self::assertSame(\INF, (new Value(\INF))->getValue());
    }

    public function testGetValueOfNegInf(): void
    {
        self::assertSame(-\INF, (new Value(-\INF))->getValue());
    }

    public function testAddInf(): void
    {
        $value = new Value(1);

        $value->add(\INF);

        self::assertTrue($value->isInfinite());
        self::assertSame(\INF, $value->getValue());
    }

    public function testSubtractInf(): void
    {
        $value = new Value(1);

        $value->subtract(\INF);

        self::assertTrue($value->isInfinite());
        self::assertSame(-\INF, $value->getValue());
    }

    public function testMultiplyInf(): void
    {
        $value = new Value(1);

        $value->multiply(\INF);

        self::assertTrue($value->isInfinite());
        self::assertSame(\INF, $value->getValue());
    }

    public function testDivideInf(): void
    {
        $value = new Value(1);

        $value->divide(\INF);

        self::assertTrue($value->isAlmostZero());
    }

    public function testDivideByZero(): void
    {
        $value = new Value(1);

        $value->divide(0);

        self::assertTrue($value->isInfinite());
    }

    public function testThatAddingNewValueIsNotPossibleOnInf(): void
    {
        $value = new Value(\INF);

        self::expectException(CalculationWithInfinityException::class);

        $value->add(1);
    }

    public function testThatMultiplyingOnInfIsNotPossible(): void
    {
        $value = new Value(\INF);

        self::expectException(CalculationWithInfinityException::class);

        $value->multiply(1);
    }

    public function testThatSubtractingFromInfIsNotPossible(): void
    {
        $value = new Value(\INF);

        self::expectException(CalculationWithInfinityException::class);

        $value->subtract(1);
    }

    public function testThatDividingInfIsNotPossible(): void
    {
        $value = new Value(\INF);

        self::expectException(CalculationWithInfinityException::class);

        $value->divide(1);
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
