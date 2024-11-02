<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Calculators;

use MiBo\Properties\Area;
use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Exceptions\DivisionByZeroException;
use MiBo\Properties\Length;
use MiBo\Properties\Pure;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\DeciMeter;
use MiBo\Properties\Units\Length\Meter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class PropertyCalcMergeQuantitiesTest
 *
 * @package MiBo\Properties\Tests\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(PropertyCalc::class)]
#[CoversClass(Pure::class)]
#[Small]
class PropertyCalcMergeQuantitiesTest extends TestCase
{
    public function testMultiply(): void
    {
        $list = [
            10 => [5, 2],
            9  => [1, 9],
            4  => [2, 2],
        ];

        foreach ($list as $expected => $values) {
            $property1 = new Length($values[0], Meter::get());
            $property2 = new Length($values[1] * 10, DeciMeter::get());
            $result    = PropertyCalc::multiply($property1, $property2);

            self::assertInstanceOf(Area::class, $result);
            self::assertSame($expected, $result->getValue());
        }
    }

    public function testDivide(): void
    {
        $property1 = new Area(100, SquareMeter::get());
        $property2 = new Length(100, DeciMeter::get());
        $result    = PropertyCalc::divide($property1, $property2);

        self::assertInstanceOf(Length::class, $result);
        self::assertSame(10, $result->getValue());
    }

    public function testDivideByZero(): void
    {
        $property1 = new Area(100, SquareMeter::get());
        $property2 = new Length(0, DeciMeter::get());

        $this->expectException(DivisionByZeroException::class);

        PropertyCalc::divide($property1, $property2);
    }

    public function testDivideByPure(): void
    {
        $property1 = new Length(10, Meter::get());
        $property2 = new Pure(10);

        $property3 = PropertyCalc::divide($property1, $property2);

        self::assertInstanceOf(Length::class, $property3);
        self::assertSame(1, $property3->getValue());
    }

    public function testMultiplyByPure(): void
    {
        $property1 = new Length(10, DeciMeter::get());
        $property2 = new Pure(10);

        $property3 = PropertyCalc::multiply($property1, $property2);

        self::assertInstanceOf(Length::class, $property3);
        self::assertSame(100, $property3->getValue());
    }

    public function testDivideSameQuantities(): void
    {
        $property1 = new Length(1, Meter::get());
        $property2 = new Length(5, DeciMeter::get());

        $property3 = PropertyCalc::divide($property1, $property2);

        self::assertInstanceOf(Pure::class, $property3);
        self::assertSame(2.0, $property3->getValue());
    }
}
