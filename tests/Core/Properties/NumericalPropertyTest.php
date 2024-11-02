<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Properties;

use MiBo\Properties\Area;
use MiBo\Properties\Length;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\KiloMeter;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class NumericalPropertyTest
 *
 * @package MiBo\Properties\Tests\Core\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(NumericalProperty::class)]
#[CoversClass(Property::class)]
#[Small]
class NumericalPropertyTest extends TestCase
{
    public function testAdd(): void
    {
        $property = new Length(10, Meter::get());

        self::assertEquals(20, $property->add(10)->getValue());

        self::assertEquals(40, $property->add($property)->getValue());

        self::assertEquals(
            50,
            $property->add((new Length(new Value(1, 1), Meter::get())))->getValue()
        );

        self::assertInstanceOf(Length::class, $property);
    }

    public function testSub(): void
    {
        $property = new Length(100, Meter::get());

        self::assertEquals(90, $property->subtract(10)->getValue());

        self::assertEquals(0, $property->subtract($property)->getValue());

        self::assertEquals(
            -10,
            $property->subtract((new Length(new Value(1, 1), Meter::get())))->getValue()
        );

        self::assertInstanceOf(Length::class, $property);
    }

    public function testMultiply(): void
    {
        $property = new Length(5, Meter::get());

        self::assertEquals(10, $property->multiply(2)->getValue());

        self::assertEquals(100, $property->multiply($property)->getValue());

        $property2 = $property->multiply((new Length(new Value(1, 1), Meter::get())));

        self::assertEquals(
            100,
            $property2->getValue()
        );

        self::assertInstanceOf(Area::class, $property2);
    }

    public function testDivide(): void
    {
        $property = new Area(100, SquareMeter::get());

        self::assertEquals(50, $property->divide(2)->getValue());

        $property2 = $property->divide((new Length(new Value(1, 1), Meter::get())));

        self::assertEquals(
            5,
            $property2->getValue()
        );

        self::assertInstanceOf(Length::class, $property2);
    }

    public function testConvert(): void
    {
        $property = new Length(100, Meter::get());

        self::assertSame(0.1, $property->convertToUnit(KiloMeter::get())->getValue());
        self::assertSame(0.0001, $property->getBaseValue());

        $this->expectException(\InvalidArgumentException::class);

        $property->convertToUnit(SquareMeter::get());
    }
}
