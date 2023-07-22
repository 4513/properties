<?php

declare(strict_types=1);

namespace MiBo\Properties\Calculators;

use InvalidArgumentException;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Quantities\Amount;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\Mass;
use MiBo\Properties\Quantities\ThermodynamicTemperature;
use MiBo\Properties\Quantities\Time;
use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Units\Amount\BakersDozen;
use MiBo\Properties\Units\Amount\Brace;
use MiBo\Properties\Units\Amount\Century;
use MiBo\Properties\Units\Amount\Couple;
use MiBo\Properties\Units\Amount\Decade;
use MiBo\Properties\Units\Amount\Dozen;
use MiBo\Properties\Units\Amount\Duo;
use MiBo\Properties\Units\Amount\Grand;
use MiBo\Properties\Units\Amount\GreatGross;
use MiBo\Properties\Units\Amount\GreatHundred;
use MiBo\Properties\Units\Amount\Gross;
use MiBo\Properties\Units\Amount\HalfDozen;
use MiBo\Properties\Units\Amount\HatTrick;
use MiBo\Properties\Units\Amount\Large;
use MiBo\Properties\Units\Amount\Myriad;
use MiBo\Properties\Units\Amount\Pair;
use MiBo\Properties\Units\Amount\Quartet;
use MiBo\Properties\Units\Amount\Score;
use MiBo\Properties\Units\Amount\Several;
use MiBo\Properties\Units\Amount\SmallGross;
use MiBo\Properties\Units\Amount\Trio;
use MiBo\Properties\Units\Amount\Unit;
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
use MiBo\Properties\Units\Mass\Dalton;
use MiBo\Properties\Units\Mass\Drachm;
use MiBo\Properties\Units\Mass\Grain;
use MiBo\Properties\Units\Mass\Hundedweight;
use MiBo\Properties\Units\Mass\LongTon;
use MiBo\Properties\Units\Mass\Ounce;
use MiBo\Properties\Units\Mass\Pound;
use MiBo\Properties\Units\Mass\Quarter;
use MiBo\Properties\Units\Mass\ShortTon;
use MiBo\Properties\Units\Mass\Slug;
use MiBo\Properties\Units\Mass\Stone;
use MiBo\Properties\Units\Mass\Ton;
use MiBo\Properties\Units\Mass\USHundredweight;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeCelsius;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeFahrenheit;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeNewton;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeRankine;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeReaumur;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeRomer;
use MiBo\Properties\Units\ThermodynamicTemperature\Kelvin;
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
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class UnitConvertor
{
    protected const UNIT_COEFFICIENTS = [
        Amount::class => [
            BakersDozen::class  => 13,
            Brace::class        => 2,
            Century::class      => 100,
            Couple::class       => 2,
            Decade::class       => 10,
            Dozen::class        => 12,
            Duo::class          => 2,
            Grand::class        => 1_000,
            GreatGross::class   => 1_728,
            GreatHundred::class => 120,
            Gross::class        => 144,
            HalfDozen::class    => 6,
            HatTrick::class     => 3,
            Large::class        => 1_000,
            Myriad::class       => 10_000,
            Pair::class         => 2,
            Quartet::class      => 4,
            Score::class        => 20,
            SmallGross::class   => 120,
            Trio::class         => 3,
            Unit::class         => 1,
        ],
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
        Mass::class   => [
            Dalton::class          => 1_660_539_040,
            Drachm::class          => 17_718_451_953_125,
            Grain::class           => 6_479_891,
            Hundedweight::class    => 5_080_234_544,
            LongTon::class         => 10_160_469_088,
            Ounce::class           => 28_349_523_125,
            Pound::class           => 45_359_237,
            Quarter::class         => 1_270_058_636,
            ShortTon::class        => 90_718_474,
            Slug::class            => 1_459_390_294,
            Stone::class           => 650_029_318,
            Ton::class             => 1_0160_469_088,
            USHundredweight::class => 45_359_237,
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

    protected const UNIT_SPECIAL = [
        ThermodynamicTemperature::class,
    ];

    /**
     * List of custom unit convertors.
     *
     * Key of the array is requested quantity. The value is a closure that takes two arguments:
     * - property to convert;
     * - unit to convert to,
     *
     * and returns converted value.
     *
     * @phpcs:ignore
     * @var array<class-string<\MiBo\Properties\Contracts\Quantity>, \Closure(\MiBo\Properties\NumericalProperty, \MiBo\Properties\Contracts\Unit): \MiBo\Properties\Value>
     */
    public static array $unitConvertors = [];

    /**
     * Converts property to given unit.
     *
     * @param \MiBo\Properties\NumericalProperty $property Property to convert.
     * @param \MiBo\Properties\Contracts\NumericalUnit $unit Unit to convert to.
     *
     * @return \MiBo\Properties\Value Converted value.
     */
    public static function convert(NumericalProperty $property, NumericalUnit $unit): Value
    {
        if ($property->getUnit()->is($unit)) {
            return $property->getNumericalValue();
        }

        if ($property::getQuantityClassName() !== $unit::getQuantityClassName()) {
            throw new InvalidArgumentException(
                "Cannot convert {$property::getQuantityClassName()} to {$unit::getQuantityClassName()}"
            );
        }

        $currentValue = $property->getNumericalValue();
        $currentUnit  = $property->getUnit();
        $quantity     = $property::getQuantityClassName();

        if (key_exists($quantity, self::$unitConvertors)) {
            return self::$unitConvertors[$quantity]($property, $unit);
        }

        if (in_array($quantity, self::UNIT_SPECIAL)) {
            /** @see \MiBo\Properties\Calculators\UnitConvertor::convertT */
            $method = "convert" . $quantity::getDimensionSymbol();

            return self::$method($property, $unit);
        }

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

    /**
     * Converts thermodynamic temperature to given unit.
     *
     * @param \MiBo\Properties\NumericalProperty $property Property to convert.
     * @param \MiBo\Properties\Contracts\NumericalUnit $unit Unit to convert to.
     *
     * @return \MiBo\Properties\Value Converted value.
     */
    protected static function convertT(NumericalProperty $property, NumericalUnit $unit): Value
    {
        $value = $property->getNumericalValue();

        switch ($property->getUnit()::class) {
            case DegreeCelsius::class:
                $value->add(27_315, -2);
            break;

            case DegreeFahrenheit::class:
                $value->subtract(32)
                    ->multiply(5)
                    ->divide(9)
                    ->add(27_315, 2);
            break;

            case DegreeNewton::class:
                $value->multiply(100)
                    ->divide(33)
                    ->add(27_315, -2);
            break;

            case DegreeRankine::class:
                $value->multiply(5)
                    ->divide(9);
            break;

            case DegreeReaumur::class:
                $value->divide(8, -1)
                    ->add(27_315, -2);
            break;

            case DegreeRomer::class:
                $value->subtract(75, -1)
                    ->divide(525, -3)
                    ->add(27_315, -2);
            break;

            case Kelvin::class:
            default:
                $value->multiply(1, $property->getUnit()->getMultiplier());
            break;
        }

        switch ($unit::class) {
            case DegreeCelsius::class:
                $value->subtract(27_315, -2);
            return $value;

            case DegreeFahrenheit::class:
                $value->subtract(27_315, -2)
                    ->multiply(9)
                    ->divide(5)
                    ->add(32);
            return $value;

            case DegreeNewton::class:
                $value->subtract(27_315, -2)
                    ->multiply(33)
                    ->divide(100);
            return $value;

            case DegreeRankine::class:
                $value->multiply(9)
                    ->divide(5);
            return $value;

            case DegreeReaumur::class:
                $value->subtract(27_315, -2)
                    ->multiply(8, -1);
            return $value;

            case DegreeRomer::class:
                $value->subtract(27_315, -2)
                    ->multiply(525, -3)
                    ->add(75, -1);
            return $value;

            case Kelvin::class:
            default:
                $value->divide(1, $unit->getMultiplier());
            return $value;
        }
    }
}
