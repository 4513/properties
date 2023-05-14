<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Units\Length\AttoMeter;
use MiBo\Properties\Units\Length\CentiMeter;
use MiBo\Properties\Units\Length\DecaMeter;
use MiBo\Properties\Units\Length\DeciMeter;
use MiBo\Properties\Units\Length\ExaMeter;
use MiBo\Properties\Units\Length\FemtoMeter;
use MiBo\Properties\Units\Length\GigaMeter;
use MiBo\Properties\Units\Length\HectoMeter;
use MiBo\Properties\Units\Length\KiloMeter;
use MiBo\Properties\Units\Length\MegaMeter;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\MicroMeter;
use MiBo\Properties\Units\Length\MilliMeter;
use MiBo\Properties\Units\Length\NanoMeter;
use MiBo\Properties\Units\Length\PetaMeter;
use MiBo\Properties\Units\Length\PicoMeter;
use MiBo\Properties\Units\Length\TeraMeter;
use MiBo\Properties\Units\Length\YoctoMeter;
use MiBo\Properties\Units\Length\YottaMeter;
use MiBo\Properties\Units\Length\ZeptoMeter;
use MiBo\Properties\Units\Length\ZettaMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class SIUnitTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class SIUnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Prefixes\Atto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Atto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Atto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Centi::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Centi::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Centi::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Deca::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Deca::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Deca::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Deci::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Deci::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Deci::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Exa::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Exa::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Exa::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Femto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Femto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Femto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Giga::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Giga::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Giga::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Hecto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Hecto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Hecto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Kilo::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Kilo::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Kilo::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Mega::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Mega::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Mega::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Micro::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Micro::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Micro::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Milli::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Milli::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Milli::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Nano::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Nano::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Nano::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Peta::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Peta::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Peta::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Pico::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Pico::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Pico::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Tera::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Tera::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Tera::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Yocto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Yocto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Yocto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Yotta::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Yotta::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Yotta::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Zepto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Zepto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Zepto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Zetta::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Zetta::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Zetta::getNamePrefix
     *
     * @return void
     */
    public function test(): void
    {
        $defaultName = "meter";
        $defaultSymbol = "m";

        $list = [
            [
                "class" => AttoMeter::class,
                "symbol" => "a",
                "multiplier" => -18,
                "name" => "atto",
            ],
            [
                "class" => CentiMeter::class,
                "symbol" => "c",
                "multiplier" => -2,
                "name" => "centi",
            ],
            [
                "class" => DecaMeter::class,
                "symbol" => "da",
                "multiplier" => 1,
                "name" => "deca",
            ],
            [
                "class" => DeciMeter::class,
                "symbol" => "d",
                "multiplier" => -1,
                "name" => "deci",
            ],
            [
                "class" => ExaMeter::class,
                "symbol" => "E",
                "multiplier" => 18,
                "name" => "exa",
            ],
            [
                "class" => FemtoMeter::class,
                "symbol" => "f",
                "multiplier" => -15,
                "name" => "femto",
            ],
            [
                "class" => GigaMeter::class,
                "symbol" => "G",
                "multiplier" => 9,
                "name" => "giga",
            ],
            [
                "class" => HectoMeter::class,
                "symbol" => "h",
                "multiplier" => 2,
                "name" => "hecto",
            ],
            [
                "class" => KiloMeter::class,
                "symbol" => "k",
                "multiplier" => 3,
                "name" => "kilo",
            ],
            [
                "class" => MegaMeter::class,
                "symbol" => "M",
                "multiplier" => 6,
                "name" => "mega",
            ],
            [
                "class" => MicroMeter::class,
                "symbol" => "μ",
                "multiplier" => -6,
                "name" => "micro",
            ],
            [
                "class" => MilliMeter::class,
                "symbol" => "m",
                "multiplier" => -3,
                "name" => "milli",
            ],
            [
                "class" => NanoMeter::class,
                "symbol" => "n",
                "multiplier" => -9,
                "name" => "nano",
            ],
            [
                "class" => PetaMeter::class,
                "symbol" => "P",
                "multiplier" => 15,
                "name" => "peta",
            ],
            [
                "class" => PicoMeter::class,
                "symbol" => "p",
                "multiplier" => -12,
                "name" => "pico",
            ],
            [
                "class" => TeraMeter::class,
                "symbol" => "T",
                "multiplier" => 12,
                "name" => "tera",
            ],
            [
                "class" => YoctoMeter::class,
                "symbol" => "y",
                "multiplier" => -24,
                "name" => "yocto",
            ],
            [
                "class" => YottaMeter::class,
                "symbol" => "Y",
                "multiplier" => 24,
                "name" => "yotta",
            ],
            [
                "class" => ZeptoMeter::class,
                "symbol" => "z",
                "multiplier" => -21,
                "name" => "zepto",
            ],
            [
                "class" => ZettaMeter::class,
                "symbol" => "Z",
                "multiplier" => 21,
                "name" => "zetta",
            ],
            [
                "class" => Meter::class,
                "symbol" => "",
                "multiplier" => 0,
                "name" => "",
            ],
        ];

        foreach ($list as $item) {
            $this->assertProperties(
                ($item["class"])::get(),
                $defaultName,
                $defaultSymbol,
                $item["symbol"],
                $item["multiplier"],
                $item["name"]
            );
        }
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalUnit $property
     * @param string $defaultName
     * @param string $defaultSymbol
     * @param string $symbol
     * @param int $multiplier
     * @param string $name
     *
     * @return void
     */
    private function assertProperties(
        NumericalUnit $property,
        string $defaultName,
        string $defaultSymbol,
        string $symbol,
        int $multiplier,
        string $name
    ): void
    {
        $this->assertSame($multiplier, $property->getMultiplier());
        $this->assertSame($name . $defaultName, $property->getName());
        $this->assertSame($symbol . $defaultSymbol, $property->getSymbol());
    }
}
