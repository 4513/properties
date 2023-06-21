<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Calculators;

use InvalidArgumentException;
use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Exceptions\IncompatiblePropertyError;
use MiBo\Properties\Length;
use MiBo\Properties\Time;
use MiBo\Properties\Units\Length\DeciMeter;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Time\Second;
use PHPUnit\Framework\TestCase;

/**
 * Class PropertyCalcMergeTest
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
class PropertyCalcMergeTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::add
     * @covers ::merge
     *
     * @return void
     */
    public function testAdd(): void
    {
        $property1 = new Length(1, Meter::get());
        $property2 = new Length(2, Meter::get());
        $property3 = new Length(10, DeciMeter::get());
        $result    = PropertyCalc::add($property1, $property2, $property3);

        $this->assertSame(4, $result->getValue());
    }

    /**
     * @small
     *
     * @covers ::add
     * @covers ::merge
     *
     * @return void
     */
    public function testAddWithException(): void
    {
        $property1 = new Length(1, Meter::get());
        $property2 = new Length(2, Meter::get());
        $property3 = new Time(10, Second::get());

        $this->expectException(IncompatiblePropertyError::class);

        PropertyCalc::add($property1, $property2, $property3);
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
        $property1 = new Length(10, Meter::get());
        $property2 = new Length(2, Meter::get());
        $property3 = new Length(10, DeciMeter::get());
        $result    = PropertyCalc::subtract($property1, $property2, $property3);

        $this->assertSame(7, $result->getValue());
    }

    /**
     * @small
     *
     * @covers ::subtract
     * @covers ::merge
     *
     * @return void
     */
    public function testSubtractWithException(): void
    {
        $property1 = new Length(10, Meter::get());
        $property2 = new Length(2, Meter::get());
        $property3 = new Time(10, Second::get());

        $this->expectException(IncompatiblePropertyError::class);

        PropertyCalc::subtract($property1, $property2, $property3);
    }
}
