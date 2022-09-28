<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derivable;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Length\Meter;

/**
 * Class Length
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Length implements Quantity, Derivable
{
    public static function getDefaultUnit(): Unit
    {
        return Meter::get();
    }

    public static function getSymbol(): string
    {
        return "l";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }

    public static function getEquations(): array
    {
        return [
            "(A) / (l)",
        ];
    }
}
