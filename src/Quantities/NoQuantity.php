<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derivable;
use MiBo\Properties\Contracts\Derived;
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
class NoQuantity implements Quantity, Derivable, Derived
{
    public static function getDefaultUnit(): Unit
    {
        return NoUnit::get();
    }

    public static function getEquations(): array
    {
        return [
            "",
            "() / ()",
            "() * ()",
        ];
    }

    public static function getSymbol(): string
    {
        return "";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }

    public static function getRequiredQuantities(): array
    {
        return [
            self::class,
        ];
    }
}
