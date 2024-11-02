<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Prefixes\Atto;
use MiBo\Properties\Prefixes\Centi;
use MiBo\Properties\Prefixes\Deca;
use MiBo\Properties\Prefixes\Deci;
use MiBo\Properties\Prefixes\Exa;
use MiBo\Properties\Prefixes\Femto;
use MiBo\Properties\Prefixes\Giga;
use MiBo\Properties\Prefixes\Hecto;
use MiBo\Properties\Prefixes\Kilo;
use MiBo\Properties\Prefixes\Mega;
use MiBo\Properties\Prefixes\Micro;
use MiBo\Properties\Prefixes\Milli;
use MiBo\Properties\Prefixes\Nano;
use MiBo\Properties\Prefixes\Peta;
use MiBo\Properties\Prefixes\Pico;
use MiBo\Properties\Prefixes\Tera;
use MiBo\Properties\Prefixes\Yocto;
use MiBo\Properties\Prefixes\Yotta;
use MiBo\Properties\Prefixes\Zepto;
use MiBo\Properties\Prefixes\Zetta;
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
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
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
#[CoversClass(Atto::class)]
#[CoversClass(Centi::class)]
#[CoversClass(Deca::class)]
#[CoversClass(Deci::class)]
#[CoversClass(Exa::class)]
#[CoversClass(Femto::class)]
#[CoversClass(Giga::class)]
#[CoversClass(Hecto::class)]
#[CoversClass(Kilo::class)]
#[CoversClass(Mega::class)]
#[CoversClass(Micro::class)]
#[CoversClass(Milli::class)]
#[CoversClass(Nano::class)]
#[CoversClass(Peta::class)]
#[CoversClass(Pico::class)]
#[CoversClass(Tera::class)]
#[CoversClass(Yocto::class)]
#[CoversClass(Yotta::class)]
#[CoversClass(Zepto::class)]
#[CoversClass(Zetta::class)]
#[Small]
class SIUnitTest extends TestCase
{
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
            self::assertProperties(
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
    private static function assertProperties(
        NumericalUnit $property,
        string $defaultName,
        string $defaultSymbol,
        string $symbol,
        int $multiplier,
        string $name
    ): void
    {
        self::assertSame($multiplier, $property->getMultiplier());
        self::assertSame($name . $defaultName, $property->getName());
        self::assertSame($symbol . $defaultSymbol, $property->getSymbol());
    }
}
