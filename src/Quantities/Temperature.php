<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Temperature as TemperatureProperty;
use MiBo\Properties\Units\Temperature\Kelvin;

/**
 * Class Temperature
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Temperature implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        return Kelvin::get();
    }

    public static function getSymbol(): string
    {
        return "T";
    }

    public static function getDefaultProperty(): string
    {
        return TemperatureProperty::class;
    }
}
