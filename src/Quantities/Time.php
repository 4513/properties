<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derivable;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Time\Second;

/**
 * Class Time
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Time implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        return Second::get();
    }

    public static function getSymbol(): string
    {
        return "t";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
