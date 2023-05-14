<?php

declare(strict_types = 1);

namespace MiBo\Properties\Calculators;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\Time;
use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Units\Area\Acre;
use MiBo\Properties\Units\Area\Bovate;
use MiBo\Properties\Units\Area\Carucate;
use MiBo\Properties\Units\Area\Rood;
use MiBo\Properties\Units\Area\Section;
use MiBo\Properties\Units\Area\SurveyTownship;
use MiBo\Properties\Units\Area\Virgate;
use MiBo\Properties\Units\Length\AstronomicalUnit;
use MiBo\Properties\Units\Length\Barleycorn;
use MiBo\Properties\Units\Length\Cable;
use MiBo\Properties\Units\Length\Chain;
use MiBo\Properties\Units\Length\Cubit;
use MiBo\Properties\Units\Length\Digit;
use MiBo\Properties\Units\Length\Ell;
use MiBo\Properties\Units\Length\Fathom;
use MiBo\Properties\Units\Length\Finger;
use MiBo\Properties\Units\Length\Foot;
use MiBo\Properties\Units\Length\Furlong;
use MiBo\Properties\Units\Length\Hand;
use MiBo\Properties\Units\Length\Inch;
use MiBo\Properties\Units\Length\League;
use MiBo\Properties\Units\Length\Line;
use MiBo\Properties\Units\Length\Link;
use MiBo\Properties\Units\Length\Mile;
use MiBo\Properties\Units\Length\Nail;
use MiBo\Properties\Units\Length\NauticalMile;
use MiBo\Properties\Units\Length\Palm;
use MiBo\Properties\Units\Length\Pica;
use MiBo\Properties\Units\Length\Point;
use MiBo\Properties\Units\Length\Rod;
use MiBo\Properties\Units\Length\Shaftment;
use MiBo\Properties\Units\Length\Span;
use MiBo\Properties\Units\Length\Thou;
use MiBo\Properties\Units\Length\Twip;
use MiBo\Properties\Units\Length\Yard;
use MiBo\Properties\Units\Time\Day;
use MiBo\Properties\Units\Time\Hour;
use MiBo\Properties\Units\Time\Minute;
use MiBo\Properties\Units\Volume\AcreFoot;
use MiBo\Properties\Units\Volume\Barrel;
use MiBo\Properties\Units\Volume\ImperialFluidOunce;
use MiBo\Properties\Units\Volume\ImperialGallon;
use MiBo\Properties\Units\Volume\ImperialGill;
use MiBo\Properties\Units\Volume\ImperialPint;
use MiBo\Properties\Units\Volume\ImperialQuart;
use MiBo\Properties\Units\Volume\USFluidOunce;
use MiBo\Properties\Units\Volume\USGallon;
use MiBo\Properties\Units\Volume\USGill;
use MiBo\Properties\Units\Volume\USPint;
use MiBo\Properties\Units\Volume\USQuart;
use MiBo\Properties\Value;

/**
 * Class UnitConvertor
 *
 * @package MiBo\Properties\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class UnitConvertor
{
    protected const UNIT_COEFFICIENTS = [
        Area::class   => [
            Acre::class           => 4_046_873,
            Bovate::class         => 60,
            Carucate::class       => 490,
            Rood::class           => 1_011_714,
            Section::class        => 2_589_988,
            SurveyTownship::class => 93_239_930,
            Virgate::class        => 120,
        ],
        Length::class => [
            AstronomicalUnit::class => 149_597_870_700,
            Barleycorn::class       => 84_667,
            Cable::class            => 219_456,
            Chain::class            => 201_168,
            Cubit::class            => 8_866,
            Digit::class            => 19,
            Ell::class              => 1_143,
            Fathom::class           => 18_288,
            Finger::class           => 1_905,
            Foot::class             => 3_048,
            Furlong::class          => 201_168,
            Hand::class             => 1_016,
            Inch::class             => 254,
            League::class           => 4_828_032,
            Line::class             => 655,
            Link::class             => 2_012,
            Mile::class             => 1_609_334,
            Nail::class             => 5_715,
            NauticalMile::class     => 1_852,
            Palm::class             => 762,
            Pica::class             => 4_233,
            Point::class            => 352_778,
            Rod::class              => 50_292,
            Shaftment::class        => 1_524,
            Span::class             => 2_286,
            Thou::class             => 254,
            Twip::class             => 176_389,
            Yard::class             => 9_144,
        ],
        Time::class   => [
            Day::class    => 864_000,
            Hour::class   => 3_600,
            Minute::class => 60,
        ],
        Volume::class => [
            AcreFoot::class           => 12_335,
            Barrel::class             => 119_240_471_196,
            ImperialFluidOunce::class => 284_130_625,
            ImperialGallon::class     => 454_609,
            ImperialGill::class       => 1_420_653_125,
            ImperialPint::class       => 56_826_125,
            ImperialQuart::class      => 11_365_225,
            USFluidOunce::class       => 295_735_295_625,
            USGallon::class           => 3_785_411_784,
            USGill::class             => 11_829_411_825,
            USPint::class             => 473_176_473,
            USQuart::class            => 946_352_946,
        ],
    ];

    public static function convert(NumericalProperty $property, Unit $unit): Value
    {
        if ($property->getUnit()::class === $unit::class) {
            return $property->getNumericalValue();
        }

        $currentValue = $property->getNumericalValue();
        $currentUnit  = $property->getUnit();
        $quantity     = $property::getQuantityClassName();

        if (!key_exists($quantity, self::UNIT_COEFFICIENTS)) {
            return $currentValue->multiply(1, $currentUnit->getMultiplier())
                ->divide(1, $unit->getMultiplier());
        }

        $coefs = self::UNIT_COEFFICIENTS[$quantity];

        $currentValue->multiply(
            key_exists($currentUnit::class, $coefs) ? $coefs[$currentUnit::class] : 1,
            $currentUnit->getMultiplier()
        );

        return $currentValue->divide(
            key_exists($unit::class, $coefs) ? $coefs[$unit::class] : 1,
            $unit->getMultiplier()
        );
    }
}
