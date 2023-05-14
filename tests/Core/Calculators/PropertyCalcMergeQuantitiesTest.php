<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Calculators;

use DivisionByZeroError;
use MiBo\Properties\Area;
use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Length;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\DeciMeter;
use MiBo\Properties\Units\Length\Meter;
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
 *
 * @coversDefaultClass \MiBo\Properties\Calculators\PropertyCalc
 */
class PropertyCalcMergeQuantitiesTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::multiplySingle
     * @covers ::mergeQuantities
     * @covers ::compileEquations
     * @covers ::compileEquation
     *
     * @return void
     */
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

            $this->assertInstanceOf(Area::class, $result);
            $this->assertSame($expected, $result->getValue());
        }
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::checkDivisor
     * @covers ::mergeQuantities
     * @covers ::compileEquations
     * @covers ::compileEquation
     *
     * @return void
     */
    public function testDivide(): void
    {
        $property1 = new Area(100, SquareMeter::get());
        $property2 = new Length(100, DeciMeter::get());
        $result    = PropertyCalc::divide($property1, $property2);

        $this->assertInstanceOf(Length::class, $result);
        $this->assertSame(10, $result->getValue());
    }

    /**
     * @small
     *
     * @covers ::divide
     * @covers ::divideSingle
     * @covers ::checkDivisor
     *
     * @return void
     */
    public function testDivideByZero(): void
    {
        $property1 = new Area(100, SquareMeter::get());
        $property2 = new Length(0, DeciMeter::get());

        $this->expectException(DivisionByZeroError::class);

        PropertyCalc::divide($property1, $property2);
    }
}
