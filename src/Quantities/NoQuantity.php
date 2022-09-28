<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\NoQuantity\NoUnit;

/**
 * Class NoQuantity
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NoQuantity implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        return NoUnit::get();
    }

    public static function getSymbol(): string
    {
        return "";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
