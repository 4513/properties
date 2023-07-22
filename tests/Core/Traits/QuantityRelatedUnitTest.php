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
class QuantityRelatedUnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Traits\UnitForAmountOfSubstance::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForArea::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForElectricCurrent::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForLength::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForLuminousIntensity::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForMass::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForThermodynamicTemperature::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForTime::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForVolume::getQuantityClassName
     * @covers \MiBo\Properties\Traits\UnitForAmount::getQuantityClassName
     *
     * @return void
     */
    public function test(): void
    {
        foreach ($this->getList() as $unit => $quantity) {
            $this->assertSame($quantity, $unit::get()::getQuantityClassName());
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
