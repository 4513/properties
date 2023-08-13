<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Quantities;

use MiBo\Properties\Quantities\Amount;
use MiBo\Properties\Quantities\ElectricCurrent;
use MiBo\Properties\Quantities\AmountOfSubstance;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\LuminousIntensity;
use MiBo\Properties\Quantities\Mass;
use MiBo\Properties\Quantities\PerUnit;
use MiBo\Properties\Quantities\ThermodynamicTemperature;
use MiBo\Properties\Quantities\Time;
use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Units\Amount\Piece;
use MiBo\Properties\Units\AmountOfSubstance\Mole;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\ElectricCurrent\Ampere;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\LuminousIntensity\Candela;
use MiBo\Properties\Units\Mass\KiloGram;
use MiBo\Properties\Units\PerUnit\PerNotSpecified;
use MiBo\Properties\Units\Pure\NoUnit;
use MiBo\Properties\Units\ThermodynamicTemperature\Kelvin;
use MiBo\Properties\Units\Time\Second;
use MiBo\Properties\Units\Volume\CubicMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class QuantityTest
 *
 * @package MiBo\Properties\Tests\Core\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Traits\QuantityHelper
 */
class QuantityTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Quantities\Area::getEquations
     * @covers \MiBo\Properties\Quantities\Volume::getEquations
     *
     * @return void
     */
    public function testDerived(): void
    {
        $list = [
            Volume::class => [Area::class . " * " . Length::class],
            Area::class   => [Length::class . " * " . Length::class],
        ];

        foreach ($list as $quantity => $equation) {
            $this->assertSame($equation, $quantity::getEquations());
        }
    }

    /**
     * @small
     *
     * @covers ::getDefaultUnit
     * @covers \MiBo\Properties\Quantities\AmountOfSubstance::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\AmountOfSubstance::getInitialUnit
     * @covers \MiBo\Properties\Quantities\AmountOfSubstance::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\Area::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\Area::getInitialUnit
     * @covers \MiBo\Properties\Quantities\Area::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\ElectricCurrent::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\ElectricCurrent::getInitialUnit
     * @covers \MiBo\Properties\Quantities\ElectricCurrent::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\Length::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\Length::getInitialUnit
     * @covers \MiBo\Properties\Quantities\Length::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\LuminousIntensity::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\LuminousIntensity::getInitialUnit
     * @covers \MiBo\Properties\Quantities\LuminousIntensity::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\Mass::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\Mass::getInitialUnit
     * @covers \MiBo\Properties\Quantities\Mass::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\ThermodynamicTemperature::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\ThermodynamicTemperature::getInitialUnit
     * @covers \MiBo\Properties\Quantities\ThermodynamicTemperature::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\Time::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\Time::getInitialUnit
     * @covers \MiBo\Properties\Quantities\Time::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\Volume::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\Volume::getInitialUnit
     * @covers \MiBo\Properties\Quantities\Volume::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\Amount::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\Amount::getInitialUnit
     * @covers \MiBo\Properties\Quantities\Amount::getDefaultProperty
     * @covers \MiBo\Properties\Quantities\PerUnit::getDimensionSymbol
     * @covers \MiBo\Properties\Quantities\PerUnit::getInitialUnit
     * @covers \MiBo\Properties\Quantities\PerUnit::getDefaultProperty
     *
     * @return void
     */
    public function test(): void
    {
        $list = [
            [
                AmountOfSubstance::class,
                "n",
                Mole::get(),
                \MiBo\Properties\AmountOfSubstance::class,
            ],
            [
                Area::class,
                "A",
                SquareMeter::get(),
                \MiBo\Properties\Area::class,
            ],
            [
                ElectricCurrent::class,
                "I",
                Ampere::get(),
                \MiBo\Properties\ElectricCurrent::class,
            ],
            [
                Length::class,
                "L",
                Meter::get(),
                \MiBo\Properties\Length::class,
            ],
            [
                LuminousIntensity::class,
                "J",
                Candela::get(),
                \MiBo\Properties\LuminousIntensity::class,
            ],
            [
                Mass::class,
                "m",
                KiloGram::get(),
                \MiBo\Properties\Mass::class,
            ],
            [
                ThermodynamicTemperature::class,
                "T",
                Kelvin::get(),
                \MiBo\Properties\ThermodynamicTemperature::class,
            ],
            [
                Time::class,
                "t",
                Second::get(),
                \MiBo\Properties\Time::class,
            ],
            [
                Volume::class,
                "V",
                CubicMeter::get(),
                \MiBo\Properties\Volume::class,
            ],
            [
                Amount::class,
                "AMOUNT",
                Piece::get(),
                \MiBo\Properties\Amount::class,
            ],
            [
                PerUnit::class,
                "PERUNIT",
                PerNotSpecified::get(NoUnit::get(), NoUnit::get()),
                \MiBo\Properties\PerUnit::class,
            ],
        ];

        foreach ($list as $item) {
            $this->assertSame($item[1], $item[0]::getDimensionSymbol());
            $this->assertSame($item[2]::class, $item[0]::getDefaultUnit()::class);
            $this->assertSame($item[3], $item[0]::getDefaultProperty());
        }
    }
}
