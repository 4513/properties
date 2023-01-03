<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derivable;
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
class Area implements Derived, Derivable
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

    public static function getEquations(): array
    {
        return [
            "(l) * (l)", // length
            "(V) / (l)", // value / length
            "(A) / ()",  // itself
            "(A) * ()",  // itself
        ];
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
