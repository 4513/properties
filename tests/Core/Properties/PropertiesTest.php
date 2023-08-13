<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Properties;

use MiBo\Properties\Amount;
use MiBo\Properties\AmountOfSubstance;
use MiBo\Properties\Area;
use MiBo\Properties\ElectricCurrent;
use MiBo\Properties\Length;
use MiBo\Properties\LuminousIntensity;
use MiBo\Properties\Mass;
use MiBo\Properties\PerUnit;
use MiBo\Properties\Pure;
use MiBo\Properties\ThermodynamicTemperature;
use MiBo\Properties\Time;
use MiBo\Properties\Volume;
use PHPUnit\Framework\TestCase;

/**
 * Class PropertiesTest
 *
 * @package MiBo\Properties\Tests\Core\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PropertiesTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Amount::getQuantityClassName
     * @covers \MiBo\Properties\AmountOfSubstance::getQuantityClassName
     * @covers \MiBo\Properties\AmountOfSubstance::getDefaultISUnit
     * @covers \MiBo\Properties\Area::getQuantityClassName
     * @covers \MiBo\Properties\Area::getDefaultISUnit
     * @covers \MiBo\Properties\ElectricCurrent::getQuantityClassName
     * @covers \MiBo\Properties\ElectricCurrent::getDefaultISUnit
     * @covers \MiBo\Properties\Length::getQuantityClassName
     * @covers \MiBo\Properties\Length::getDefaultISUnit
     * @covers \MiBo\Properties\LuminousIntensity::getQuantityClassName
     * @covers \MiBo\Properties\LuminousIntensity::getDefaultISUnit
     * @covers \MiBo\Properties\Mass::getQuantityClassName
     * @covers \MiBo\Properties\Mass::getDefaultISUnit
     * @covers \MiBo\Properties\Pure::getQuantityClassName
     * @covers \MiBo\Properties\PerUnit::getQuantityClassName
     * @covers \MiBo\Properties\ThermodynamicTemperature::getQuantityClassName
     * @covers \MiBo\Properties\ThermodynamicTemperature::getDefaultISUnit
     * @covers \MiBo\Properties\Time::getQuantityClassName
     * @covers \MiBo\Properties\Time::getDefaultISUnit
     * @covers \MiBo\Properties\Volume::getQuantityClassName
     * @covers \MiBo\Properties\Volume::getDefaultISUnit
     *
     * @return void
     */
    public function test(): void
    {
        $list = [
            Amount::class => [
                "",
                \MiBo\Properties\Quantities\Amount::class,
            ],
            AmountOfSubstance::class => [
                "Mole",
                \MiBo\Properties\Quantities\AmountOfSubstance::class,
            ],
            Area::class => [
                "Meter",
                \MiBo\Properties\Quantities\Area::class,
            ],
            ElectricCurrent::class => [
                "Ampere",
                \MiBo\Properties\Quantities\ElectricCurrent::class,
            ],
            Length::class => [
                "Meter",
                \MiBo\Properties\Quantities\Length::class,
            ],
            LuminousIntensity::class => [
                "Candela",
                \MiBo\Properties\Quantities\LuminousIntensity::class,
            ],
            Mass::class => [
                "Gram",
                \MiBo\Properties\Quantities\Mass::class,
            ],
            PerUnit::class => [
                "",
                \MiBo\Properties\Quantities\PerUnit::class,
            ],
            Pure::class => [
                "Pure",
                \MiBo\Properties\Quantities\Pure::class,
            ],
            ThermodynamicTemperature::class => [
                "Kelvin",
                \MiBo\Properties\Quantities\ThermodynamicTemperature::class,
            ],
            Time::class => [
                "Second",
                \MiBo\Properties\Quantities\Time::class,
            ],
            Volume::class => [
                "Meter",
                \MiBo\Properties\Quantities\Volume::class,
            ],
        ];

        foreach ($list as $property => $data) {
            $this->assertSame($data[1], $property::getQuantityClassName());

            if (!method_exists($property, "getDefaultISUnit")) {
                continue;
            }

            $this->assertSame($data[0], $property::getDefaultISUnit());
        }
    }
}
