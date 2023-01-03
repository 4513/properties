<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Velocity\MeterPerSecond;

/**
 * Class Velocity
 *
 * @package MiBo\Properties\Quantities
 */
class Velocity implements Quantity, Derived
{

    public static function getRequiredQuantities(): array
    {
        return [
            Length::class,
            Time::class,
        ];
    }

    public static function getEquations(): array
    {
        return [
            "(l) / (t)", // length / time
            "(v) * ()",  // itself
            "(v) / ()",  // itself
            "(a) * (t)", // acceleration * time
        ];
    }

    public static function getDefaultUnit(): Unit
    {
        return MeterPerSecond::get();
    }

    public static function getSymbol(): string
    {
        return "v";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
