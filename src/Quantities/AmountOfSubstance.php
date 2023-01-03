<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\AmountOfSubstance\Mole;

/**
 * Class AmountOfSubstance
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AmountOfSubstance implements Quantity
{
    public static function getDefaultUnit(): Unit
    {
        return Mole::get();
    }

    public static function getSymbol(): string
    {
        return "n";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
