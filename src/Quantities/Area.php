<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\IsDerived;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Area\SquareMeter;

/**
 * Class Area
 *
 * @package MiBo\Properties\Quantities
 */
class Area implements Derived
{
    use IsDerived;

    protected static array $requiredQuantities = [
        Length::class,
    ];

    public static function getDefaultUnit(): Unit
    {
        return SquareMeter::get();
    }

    public static function getSymbol(): string
    {
        return "A";
    }

    public static function getEquation(): string
    {
        return "(l) * (l)";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
