<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\IsDerived;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Volume\CubicMeter;

/**
 * Class Volume
 *
 * @package MiBo\Properties\Quantities
 */
class Volume implements Derived
{
    use IsDerived;

    protected static array $requiredQuantities = [
        Length::class,
    ];

    public static function getDefaultUnit(): Unit
    {
        return CubicMeter::get();
    }

    public static function getSymbol(): string
    {
        return "V";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }

    public static function getEquations(): array
    {
        return [
            "(l) * (A)", // length * area
            "(V) * ()",  // itself
            "(V) / ()",  // itself
        ];
    }
}
