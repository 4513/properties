<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;

/**
 * Class PlaneAngle
 *
 * @package MiBo\Properties\Quantities
 */
class PlaneAngle implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        // TODO: Implement getDefaultUnit() method.
    }

    public static function getSymbol(): string
    {
        return "";
    }

    public static function getDefaultProperty(): string
    {
        // TODO: Implement getDefaultProperty() method.
    }
}
