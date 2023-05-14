<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Units\AmountOfSubstance\NanoMole;
use MiBo\Properties\Units\Volume\CubicNanoMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitHelperTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Traits\UnitHelper
 */
class UnitHelperTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::get
     *
     * @return void
     */
    public function testLoad(): void
    {
        $unit = NanoMole::get();

        $this->assertInstanceOf(NanoMole::class, $unit);
    }

    /**
     * @small
     *
     * @covers ::getMultiplier
     *
     * @return void
     */
    public function testMultiplier(): void
    {
        $unit = NanoMole::get();

        $this->assertEquals(-9, $unit->getMultiplier());
    }

    /**
     * @small
     *
     * @covers ::getName
     * @covers ::toString
     * @covers ::__toString
     *
     * @return void
     */
    public function testName(): void
    {
        $unit     = CubicNanoMeter::get();
        $expected = "cubic nanometer";

        $this->assertSame($expected, $unit->getName());
        $this->assertSame($expected, $unit->toString());
        $this->assertSame($expected, (string) $unit);
    }

    /**
     * @small
     *
     * @covers ::getSymbol
     *
     * @return void
     */
    public function testSymbol(): void
    {
        $unit     = CubicNanoMeter::get();
        $expected = "nm³";

        $this->assertSame($expected, $unit->getSymbol());
    }
}
