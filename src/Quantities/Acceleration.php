<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Acceleration\MeterPerSecondSquared;

/**
 * Class Acceleration
 *
 * @package MiBo\Properties\Quantities
 */
class Acceleration implements Quantity, Derived
{
    public static function getRequiredQuantities(): array
    {
        return [
            Time::class,
            Length::class,
            Velocity::class,
        ];
    }

    public static function getEquations(): array
    {
        return [
            "(l) / ((t) * (t))", // length / (time * time)
            "(v) / (t)",         // velocity / time
            "(a) / ()",          // itself
            "(a) * ()",          // itself
        ];
    }

    public static function getDefaultUnit(): Unit
    {
        return MeterPerSecondSquared::get();
    }

    public static function getSymbol(): string
    {
        return "a";
    }

    public static function getDefaultProperty(): string
    {
        return Property::class;
    }
}
