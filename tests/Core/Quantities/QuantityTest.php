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
use MiBo\Properties\Traits\QuantityHelper;
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
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
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
 */
#[CoversClass(QuantityHelper::class)]
#[CoversClass(Area::class)]
#[CoversClass(Volume::class)]
#[CoversClass(AmountOfSubstance::class)]
#[CoversClass(Area::class)]
#[CoversClass(ElectricCurrent::class)]
#[CoversClass(Length::class)]
#[CoversClass(LuminousIntensity::class)]
#[CoversClass(Mass::class)]
#[CoversClass(ThermodynamicTemperature::class)]
#[CoversClass(Time::class)]
#[CoversClass(Volume::class)]
#[CoversClass(Amount::class)]
#[CoversClass(PerUnit::class)]
#[Small]
class QuantityTest extends TestCase
{
    public function testDerived(): void
    {
        $list = [
            Volume::class => [Area::class . " * " . Length::class],
            Area::class   => [Length::class . " * " . Length::class],
        ];

        foreach ($list as $quantity => $equation) {
            self::assertSame($equation, $quantity::getEquations());
        }
    }

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
            self::assertSame($item[1], $item[0]::getDimensionSymbol());
            self::assertSame($item[2]::class, $item[0]::getDefaultUnit()::class);
            self::assertSame($item[3], $item[0]::getDefaultProperty());
        }
    }
}
