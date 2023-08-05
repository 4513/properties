<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Properties;

use MiBo\Properties\Area;
use MiBo\Properties\Length;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\KiloMeter;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Value;
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
 *
 * @coversDefaultClass \MiBo\Properties\NumericalProperty
 */
class NumericalPropertyTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::add
     * @covers ::getValue
     * @covers ::getNumericalValue
     * @covers \MiBo\Properties\Property::__construct
     * @covers \MiBo\Properties\Property::getUnit
     *
     * @return void
     */
    public function testAdd(): void
    {
        $property = new Length(10, Meter::get());

        $this->assertEquals(20, $property->add(10)->getValue());

        $this->assertEquals(40, $property->add($property)->getValue());

        $this->assertEquals(
            50,
            $property->add((new Length(new Value(1, 1), Meter::get())))->getValue()
        );

        $this->assertInstanceOf(Length::class, $property);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::subtract
     * @covers ::getValue
     * @covers ::getNumericalValue
     *
     * @return void
     */
    public function testSub(): void
    {
        $property = new Length(100, Meter::get());

        $this->assertEquals(90, $property->subtract(10)->getValue());

        $this->assertEquals(0, $property->subtract($property)->getValue());

        $this->assertEquals(
            -10,
            $property->subtract((new Length(new Value(1, 1), Meter::get())))->getValue()
        );

        $this->assertInstanceOf(Length::class, $property);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::multiply
     * @covers ::getValue
     * @covers ::getNumericalValue
     * @covers ::__clone
     *
     * @return void
     */
    public function testMultiply(): void
    {
        $property = new Length(5, Meter::get());

        $this->assertEquals(10, $property->multiply(2)->getValue());

        $this->assertEquals(100, $property->multiply($property)->getValue());

        $property2 = $property->multiply((new Length(new Value(1, 1), Meter::get())));

        $this->assertEquals(
            100,
            $property2->getValue()
        );

        $this->assertInstanceOf(Area::class, $property2);
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::divide
     * @covers ::getValue
     * @covers ::getNumericalValue
     * @covers ::__clone
     *
     * @return void
     */
    public function testDivide(): void
    {
        $property = new Area(100, SquareMeter::get());

        $this->assertEquals(50, $property->divide(2)->getValue());

        $property2 = $property->divide((new Length(new Value(1, 1), Meter::get())));

        $this->assertEquals(
            5,
            $property2->getValue()
        );

        $this->assertInstanceOf(Length::class, $property2);
    }

    /**
     * @small
     *
     * @covers ::convertToUnit
     * @covers ::getBaseValue
     * @covers ::getValue
     *
     * @return void
     */
    public function testConvert(): void
    {
        $property = new Length(100, Meter::get());

        $this->assertSame(0.1, $property->convertToUnit(KiloMeter::get())->getValue());
        $this->assertSame(0.0001, $property->getBaseValue());

        $this->expectException(\InvalidArgumentException::class);

        $property->convertToUnit(SquareMeter::get());
    }
}
