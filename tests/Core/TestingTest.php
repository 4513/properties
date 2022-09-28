<?php

namespace MiBo\Properties\Tests;

use MiBo\Properties\Property;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\MilliMeter;
use MiBo\Properties\Units\Volume\CubicMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class TestingTest
 *
 * @package MiBo\Properties\Tests
 *
 * @author Michal Boris <michal.boris@gmail.com>
 *
 * @coversDefaultClass \MiBo\Properties\Property
 */
class TestingTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     *
     * @return void
     */
    public function testProperty()
    {
        $x = new Property(10, MilliMeter::get());

        $this->assertSame(10, $x->getValue());
        $this->assertSame(10**-3, $x->getUnit()->getMultiplier());
        $this->assertSame(0.01, $x->getUnit()->useMultiplier($x->getValue()));
    }

    /**
     * @small
     *
     * @covers ::convertUnit
     *
     * @return void
     */
    public function testConvertUnit()
    {
        $x = new Property(1000, MilliMeter::get());

        $x->convertUnit(Meter::get());

        $this->assertSame(1.0, $x->getValue());
    }

    /**
     * @small
     *
     * @covers ::add
     *
     * @return void
     */
    public function testAdd()
    {
        $x = new Property(1, Meter::get());

        $this->assertSame(1, $x->getValue());

        $x->add(4);

        $this->assertSame(5, $x->getValue());

        $x->add(new Property(5, Meter::get()));

        $this->assertSame(10, $x->getValue());

        $x->add(new Property(1000, MilliMeter::get()));

        $this->assertSame(11.0, $x->getValue());
    }

    /**
     * @small
     *
     * @covers ::subtract
     *
     * @return void
     */
    public function testSubtract()
    {
        $x = new Property(11, Meter::get());

        $this->assertSame(11, $x->getValue());

        $x->subtract(4);

        $this->assertSame(7, $x->getValue());

        $x->subtract(new Property(5, Meter::get()));

        $this->assertSame(2, $x->getValue());

        $x->subtract(new Property(1000, MilliMeter::get()));

        $this->assertSame(1.0, $x->getValue());
    }

    /**
     * @small
     *
     * @covers ::multiply
     *
     * @return void
     */
    public function testMultiply()
    {
        $x = new Property(1, Meter::get());

        $x->multiply(10);

        $this->assertSame(10, $x->getValue());

        $area = $x->multiply($x);

        $this->assertSame(100, $area->getValue());
    }

    /**
     * @small
     *
     * @covers ::divide
     *
     * @return void
     */
    public function testDivide()
    {
        $x = new Property(10000, CubicMeter::get());

        $x->divide(10);

        $this->assertSame(1000, $x->getValue());

        $area = $x->divide(new Property(10, Meter::get()));

        $this->assertSame(100, $area->getValue());
    }
}
