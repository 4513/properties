<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Calculators;

use InvalidArgumentException;
use MiBo\Properties\Area;
use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Length;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\DecaMeter;
use MiBo\Properties\Units\Length\KiloMeter;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Volume\CubicCentiMeter;
use MiBo\Properties\Units\Volume\CubicMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class PropertyCalcTest
 *
 * @package MiBo\Properties\Tests\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Calculators\PropertyCalc
 */
class PropertyCalcTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::add
     * @covers ::merge
     * @covers \MiBo\Properties\Units\Length\Meter::__construct
     *
     * @return void
     */
    public function testAddProperties(): void
    {
        $prop1 = Length::CENTI(100);
        $prop2 = Length::KILO(1);
        $prop3 = Length::CENTI(11);

        $this->assertSame(100_111.0, PropertyCalc::add($prop1, $prop2, $prop3));
    }

    /**
     * @small
     *
     * @covers ::add
     * @covers ::merge
     *
     * @return void
     */
    public function testAddPropertiesWithSimple(): void
    {
        $prop1 = 0.01;
        $prop2 = Length::KILO(1);
        $prop3 = Length::CENTI(11);

        $this->assertSame(1.010_11, PropertyCalc::add($prop1, $prop2, $prop3));
    }

    /**
     * @small
     *
     * @covers ::add
     * @covers ::merge
     *
     * @return void
     */
    public function testAddSimple(): void
    {
        $prop1 = 0.01;
        $prop2 = 1;
        $prop3 = 10;

        $this->assertSame(11.01, PropertyCalc::add($prop1, $prop2, $prop3));
    }

    /**
     * @small
     *
     * @covers ::add
     * @covers ::merge
     *
     * @return void
     */
    public function testAddNotCompatible(): void
    {
        $prop1 = Area::CENTI(100);
        $prop2 = Length::KILO(1);

        $this->expectException(InvalidArgumentException::class);
        PropertyCalc::add($prop1, $prop2);
    }

    /**
     * @small
     *
     * @covers ::subtract
     * @covers ::merge
     *
     * @return void
     */
    public function testSubtract(): void
    {
        $prop1 = Length::CENTI(100);
        $prop2 = Length::MILLI(100);

        $this->assertSame(90.0, PropertyCalc::subtract($prop1, $prop2));
    }

    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::multiplySingle
     * @covers ::compileEquations
     * @covers ::compileEquation
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testProduct(): void
    {
        $prop1 = new Length(10, Meter::get());
        $prop2 = new Length(10, KiloMeter::get());

        $prop3 = PropertyCalc::multiply($prop1, $prop2);

        $this->assertSame(100_000, $prop3->getValue());
        $this->assertSame(SquareMeter::get()->getName(), $prop3->getUnit()->getName());
    }

    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::multiplySingle
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testProductSimple(): void
    {
        $prop1 = 10;
        $prop2 = 10;
        $prop3 = 10;

        $this->assertSame(1000, PropertyCalc::multiply($prop1, $prop2, $prop3));
    }

    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::multiplySingle
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testProductCombinations(): void
    {
        $prop1 = 10;
        $prop2 = Length::DECA(1);
        $prop3 = 10;

        $result = PropertyCalc::multiply($prop1, $prop2, $prop3);

        $this->assertSame(100, $result->getValue());
        $this->assertSame(DecaMeter::get()->getName(), $result->getUnit()->getName());
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::compileEquations
     * @covers ::compileEquation
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testDivision(): void
    {
        $prop1 = new Area(100, SquareMeter::get());
        $prop2 = new Length(10, Meter::get());

        $prop3 = PropertyCalc::divide($prop1, $prop2);

        $this->assertSame(10, $prop3->getValue());
        $this->assertSame(Meter::get()->getName(), $prop3->getUnit()->getName());
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testDivisionSimple(): void
    {
        $prop1 = 100;
        $prop2 = 10;
        $prop3 = 10;

        $this->assertSame(1, PropertyCalc::divide($prop1, $prop2, $prop3));
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testDivisionCombination(): void
    {
        $prop1 = 100;
        $prop2 = Length::DECA(1);
        $prop3 = 10;

        $result = PropertyCalc::divide($prop1, $prop2, $prop3);

        $this->assertSame(10, $result->getValue());
        $this->assertSame(DecaMeter::get()->getName(), $result->getUnit()->getName());
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testDivisionSame(): void
    {
        $prop1 = Length::CENTI(100);
        $prop2 = Length::CENTI(100);

        $result = PropertyCalc::divide($prop1, $prop2);

        $this->assertSame(1, $result);
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::checkDivisor
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testDivisionZero(): void
    {
        $prop1 = Length::CENTI(100);
        $prop2 = Length::CENTI(0);

        $this->expectException(InvalidArgumentException::class);
        PropertyCalc::divide($prop1, $prop2);
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::checkDivisor
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testDivisionZeroSimple(): void
    {
        $prop1 = 100;
        $prop2 = 0;

        $this->expectException(InvalidArgumentException::class);
        PropertyCalc::divide($prop1, $prop2);
    }

    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::multiplySingle
     * @covers ::compileEquations
     * @covers ::compileEquation
     * @covers ::mergeQuantities
     *
     * @return void
     */
    public function testMultiMultiplication(): void
    {
        $prop1 = Length::CENTI(100);
        $prop2 = Length::CENTI(100);
        $prop3 = Length::MILLI(1000);

        $result = PropertyCalc::multiply($prop1, $prop2, $prop3);

        $this->assertSame(1.0, $result->getValue());
        $this->assertSame(CubicMeter::get()->getName(), $result->getUnit()->getName());
    }
}
