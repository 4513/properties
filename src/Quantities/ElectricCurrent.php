<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\ElectricCurrent\Ampere;

/**
 * Class ElectricCurrent
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ElectricCurrent implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        return Ampere::get();
    }

    public static function getSymbol(): string
    {
        return "I";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
