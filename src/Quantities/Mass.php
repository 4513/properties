<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Mass\KiloGram;

/**
 * Class Mass
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Mass implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        return KiloGram::get();
    }

    public static function getSymbol(): string
    {
        return "m";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
