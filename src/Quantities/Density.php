<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;

/**
 * Class Density
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Density implements Quantity, Derived
{

    public static function getRequiredQuantities(): array
    {
        return [
            Mass::class,
            Volume::class,
        ];
    }

    public static function getEquations(): array
    {
        return [
            "(m) / (V)",  // mass / volume
            "(ρ) / ()",   // itself
            "(ρ) * ()",   // itself
            "(ρA) * (l)", // surface density * length
        ];
    }

    public static function getDefaultUnit(): Unit
    {
        // TODO: Implement getDefaultUnit() method.
    }

    public static function getSymbol(): string
    {
        return "ρ";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
