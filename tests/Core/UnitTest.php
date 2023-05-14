<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests;

use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Traits\UnitHelper;
use MiBo\Properties\Units\Length\AstronomicalUnit;
use MiBo\Properties\Units\Length\Barleycorn;
use MiBo\Properties\Units\Length\CentiMeter;
use MiBo\Properties\Units\Length\Chain;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\MilliMeter;
use MiBo\Properties\Units\Length\TeraMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitTest
 *
 * @package MiBo\Properties\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Units\Length\Meter
 */
class UnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::getSymbol
     * @covers ::getMultiplier
     * @covers ::getName
     * @covers ::getQuantityClassName
     * @covers ::isImperial
     * @covers ::isSI
     * @covers ::isEnglish
     * @covers ::isMetric
     * @covers ::isUSCustomary
     * @covers ::isAstronomical
     * @covers ::get
     * @covers ::toString
     * @covers ::__toString
     * @covers ::acceptedForUseWithSI
     * @covers \MiBo\Properties\Units\Length\AstronomicalUnit::isAstronomical
     * @covers \MiBo\Properties\Units\Length\AstronomicalUnit::acceptedForUseWithSI
     * @covers \MiBo\Properties\Units\Length\Chain::isUSCustomary
     * @covers \MiBo\Properties\Units\Length\Chain::isImperial
     * @covers \MiBo\Properties\Units\Length\Chain::isMetric
     * @covers \MiBo\Properties\Units\Length\Chain::isSI
     * @covers \MiBo\Properties\Units\Length\Barleycorn::isEnglish
     * @covers \MiBo\Properties\Units\Length\Chain::acceptedForUseWithSI
     *
     * @return void
     */
    public function test(): void
    {
        $unit = Meter::get();

        $this->assertSame("m", $unit->getSymbol());
        $this->assertSame(0, $unit->getMultiplier());
        $this->assertSame("meter", $unit->getName());
        $this->assertSame(Length::class, $unit->getQuantityClassName());
        $this->assertTrue($unit->isMetric());
        $this->assertTrue($unit->isSI());
        $this->assertSame("meter", $unit->toString());
        $this->assertSame("meter", (string) $unit);
        $this->assertFalse($unit->isImperial());
        $this->assertTrue($unit->acceptedForUseWithSI());
        $this->assertFalse($unit->isUSCustomary());
        $this->assertFalse($unit->isAstronomical());
        $this->assertFalse($unit->isEnglish());

        $astronomicalUnit = AstronomicalUnit::get();
        $this->assertTrue($astronomicalUnit->isAstronomical());
        $this->assertTrue($astronomicalUnit->acceptedForUseWithSI());

        $chain = Chain::get();
        $this->assertTrue($chain->isUSCustomary());
        $this->assertTrue($chain->isImperial());
        $this->assertFalse($chain->isMetric());
        $this->assertFalse($chain->isSI());
        $this->assertFalse($chain->acceptedForUseWithSI());

        $barleycorn = Barleycorn::get();
        $this->assertTrue($barleycorn->isEnglish());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Traits\InternationSystemProperty::__callStatic
     * @covers \MiBo\Properties\Traits\InternationSystemProperty::getClassToCreate
     *
     * @return void
     */
    public function testSIStaticCall(): void
    {
        $prefixes = [
            "Milli" => MilliMeter::get(),
            "Centi" => CentiMeter::get(),
            "Tera"  => TeraMeter::get(),
        ];

        foreach ($prefixes as $prefix => $unit) {
             $this->assertSame(
                 strtolower($prefix) . "meter",
                 \MiBo\Properties\Length::{strtoupper($prefix)}()->getUnit()->getName()
             );
        }
    }

    /**
     * @small
     *
     * @coversNothing
     *
     * @return void
     */
    public function testMulti(): void
    {
        $a = new \MiBo\Properties\Length(10, Meter::get());
        $b = new \MiBo\Properties\Length(10, Meter::get());

        $final = PropertyCalc::multiply($a, $b);

        $this->assertSame(100, $final->getValue());
    }
}
