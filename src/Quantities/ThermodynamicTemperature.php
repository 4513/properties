<?php

declare(strict_types = 1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Mass\KiloGram;
use MiBo\Properties\Units\ThermodynamicTemperature\Kelvin;

/**
 * Class ThermodynamicTemperature
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ThermodynamicTemperature implements Quantity
{
    use QuantityHelper;

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): string
    {
        return "T";
    }

    protected static function getInitialUnit(): Unit
    {
        return Kelvin::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\ThermodynamicTemperature::class;
    }
}
