<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Core\Values;

use DivisionByZeroError;
use MiBo\Properties\Value;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class ValueTest
 *
 * @package MiBo\Properties\Tests\Core\Values
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Value
 */
class ValueTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::divide
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testDivision(): void
    {
        $value = new Value(0);

        $value->add(1, 4)
            ->add(1, 2)
            ->add(2, 2)
            ->add(3, 3)
            ->add(2)
            ->add(11, 1)
            ->add(11, 2)
            ->divide(2, 2);

        $this->assertSame(72.56, $value->getValue());

        $value->add(44, -2);

        $this->assertSame(73, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::multiply
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testMultiplication(): void
    {
        $value = new Value(0);

        $value->add(1, 4)
            ->add(1, 2)
            ->add(2, 2)
            ->add(3, 3)
            ->add(1)
            ->add(11, 1)
            ->add(11, 2)
            ->multiply(1, 2);

        $this->assertSame(1451100, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testOnlyPositives(): void
    {
        $value = new Value(0);

        $value->add(1, 4)
            ->add(1, 2)
            ->add(2, 2)
            ->add(3, 3)
            ->add(1)
            ->add(11, 1)
            ->add(11, 2);

        $this->assertSame(14511, $value->getValue());
        $this->assertSame(14511 * 10**5, $value->getValue(-5));
        $this->assertSame(0.145_110, $value->getValue(5));
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testMostlyNegatives(): void
    {
        $value = new Value(0);

        $value->add(1, -4)
            ->add(1, -2)
            ->add(2, -2)
            ->add(3, -3)
            ->add(1)
            ->add(11, -1)
            ->add(11, -2);

        $this->assertSame(22431*10**-4, $value->getValue());
        $this->assertSame(22431, $value->getValue(-4));
        $this->assertSame(22431*10**-8, $value->getValue(4));
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testMostlyDecimal(): void
    {
        $value = new Value(0);

        $value->add(0.1, -3)
            ->add(0.1, -1)
            ->add(0.2, -1)
            ->add(0.3, -2)
            ->add(0.1, 1)
            ->add(1.1)
            ->add(11, -2);

        $this->assertSame(22431*10**-4, $value->getValue());
        $this->assertSame(22431, $value->getValue(-4));
        $this->assertSame(22431*10**-8, $value->getValue(4));
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::multiply
     * @covers ::multiplySelf
     * @covers ::add
     * @covers ::addSelf
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testMultiValues(): void
    {
        $value1 = new Value(0);
        $value1->add(1, 4)
            ->add(1)
            ->add(10, -1)
            ->add(2, 1);

        $this->assertSame(10022, $value1->getValue());

        $value2 = new Value(0);
        $value2->add(20, -1);

        $this->assertSame(2, $value2->getValue());

        $value1->add($value2);

        $this->assertSame(10024, $value1->getValue());

        $value1->multiply($value2);

        $this->assertSame(20048, $value1->getValue());

        $value1->multiply($value2, 2);

        $this->assertSame(4009600, $value1->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::subtract
     * @covers ::add
     * @covers ::addSelf
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testUltimateSmall(): void
    {
        $value = new Value(0);

        $value->add(1, -323);

        $this->assertSame(10 ** -323, $value->getValue(0, PHP_INT_MAX));
        $this->assertSame(0.0, $value->getValue());

        $value = new Value(0);

        $value->add(1, -301);
        $value->add(1, -300);
        $value->add(1, -290);

        $this->assertSame(
            0.000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_000_010_000_000_001_1,
            $value->getValue(0, PHP_INT_MAX)
        );
        $this->assertSame(100_000_000_011, $value->getValue($value->getMinExp(), PHP_INT_MAX));

        $value->subtract(1, -301);

        $this->assertSame(10_000_000_001, $value->getValue($value->getMinExp(), PHP_INT_MAX));

        $value2 = new Value(0);
        $value2->subtract($value);

        $this->assertSame(100_000_000_01, $value->getValue($value->getMinExp(), PHP_INT_MAX));
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testResultExp(): void
    {
        $value = new Value(0);
        $value->add(0);
        $value->add(1, 6);

        $this->assertSame(1, $value->getValue(6));
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::subtract
     * @covers ::subtractSelf
     * @covers ::add
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testSubtractSelf(): void
    {
        $value1 = new Value(0);
        $value2 = new Value(1, -1);

        $this->assertSame(-0.1, $value1->subtract($value2)->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::divideSelf
     * @covers ::add
     * @covers ::getValues
     * @covers ::getValue
     * @covers ::getMinExp
     *
     * @return void
     */
    public function testDivideSelf(): void
    {
        $value = new Value(4);
        $value->divide($value);

        $this->assertSame(1, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::multiply
     *
     * @return void
     */
    public function testMultiplyZero(): void
    {
        $value = new Value(110);

        $value->multiply(0);

        $this->assertSame(0, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::multiply
     *
     * @return void
     */
    public function testMultiplyOne(): void
    {
        $value = new Value(110);

        $value->multiply(1);

        $this->assertSame(110, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::getValue
     *
     * @return void
     */
    public function testInfinityModeDivide(): void
    {
        $value                  = new Value(0);
        $value::$preferInfinity = true;

        $value->divide(0);

        $this->assertInfinite($value->getValue());

        $this->expectException(ValueError::class);

        $value->divide(0);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::multiply
     * @covers ::getValue
     *
     * @return void
     */
    public function testInfinityModeMultiply(): void
    {
        $value                  = new Value(0);
        $value::$preferInfinity = true;

        $value->divide(0);

        $this->expectException(ValueError::class);

        $value->multiply(10);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::add
     * @covers ::getValue
     *
     * @return void
     */
    public function testInfinityModeAdd(): void
    {
        $value                  = new Value(0);
        $value::$preferInfinity = true;

        $value->divide(0);

        $this->expectException(ValueError::class);

        $value->add(10);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::subtract
     * @covers ::getValue
     *
     * @return void
     */
    public function testInfinityModeSubtract(): void
    {
        $value                  = new Value(0);
        $value::$preferInfinity = true;

        $value->divide(0);

        $this->expectException(ValueError::class);

        $value->subtract(10);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::getValue
     *
     * @return void
     */
    public function testInfinityMode(): void
    {
        $value                  = new Value(0);
        $value::$preferInfinity = true;

        $value->divide(INF);

        $this->assertSame(0, $value->getValue());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     *
     * @return void
     */
    public function testDivideByZero(): void
    {
        $value = new Value(0);

        $this->expectException(DivisionByZeroError::class);

        $value->divide(0);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     *
     * @return void
     */
    public function testDivideByInfinity(): void
    {
        $value = new Value(0);

        $this->expectException(ValueError::class);

        $value->divide(INF);
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
