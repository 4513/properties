<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Traits;

use MiBo\Properties\Quantities\Amount;
use MiBo\Properties\Quantities\AmountOfSubstance;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\ElectricCurrent;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\LuminousIntensity;
use MiBo\Properties\Quantities\Mass;
use MiBo\Properties\Quantities\ThermodynamicTemperature;
use MiBo\Properties\Quantities\Time;
use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Traits\UnitForAmount;
use MiBo\Properties\Traits\UnitForAmountOfSubstance;
use MiBo\Properties\Traits\UnitForArea;
use MiBo\Properties\Traits\UnitForElectricCurrent;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitForLuminousIntensity;
use MiBo\Properties\Traits\UnitForMass;
use MiBo\Properties\Traits\UnitForThermodynamicTemperature;
use MiBo\Properties\Traits\UnitForTime;
use MiBo\Properties\Traits\UnitForVolume;
use MiBo\Properties\Units\Amount\Piece;
use MiBo\Properties\Units\AmountOfSubstance\Mole;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\ElectricCurrent\Ampere;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\LuminousIntensity\Candela;
use MiBo\Properties\Units\Mass\KiloGram;
use MiBo\Properties\Units\ThermodynamicTemperature\Kelvin;
use MiBo\Properties\Units\Time\Second;
use MiBo\Properties\Units\Volume\CubicMeter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class QuantityRelatedUnitTest
 *
 * @package MiBo\Properties\Tests\Core\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(UnitForAmountOfSubstance::class)]
#[CoversClass(UnitForArea::class)]
#[CoversClass(UnitForElectricCurrent::class)]
#[CoversClass(UnitForLength::class)]
#[CoversClass(UnitForLuminousIntensity::class)]
#[CoversClass(UnitForMass::class)]
#[CoversClass(UnitForThermodynamicTemperature::class)]
#[CoversClass(UnitForTime::class)]
#[CoversClass(UnitForVolume::class)]
#[CoversClass(UnitForAmount::class)]
#[Small]
class QuantityRelatedUnitTest extends TestCase
{
    public function test(): void
    {
        foreach ($this->getList() as $unit => $quantity) {
            self::assertSame($quantity, $unit::get()::getQuantityClassName());
        }
    }

    /**
     * @phpcs:ignore
     * @return array<class-string<\MiBo\Properties\Contracts\NumericalUnit>, class-string<\MiBo\Properties\Contracts\Quantity>>
     */
    protected function getList(): array
    {
        return [
            Mole::class => AmountOfSubstance::class,
            SquareMeter::class => Area::class,
            Ampere::class => ElectricCurrent::class,
            Meter::class => Length::class,
            Candela::class => LuminousIntensity::class,
            KiloGram::class => Mass::class,
            Kelvin::class => ThermodynamicTemperature::class,
            Second::class => Time::class,
            CubicMeter::class => Volume::class,
            Piece::class => Amount::class,
        ];
    }
}
