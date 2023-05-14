<?php

declare(strict_types = 1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\ElectricCurrent\Ampere;

/**
 * Class ElectricCurrent
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ElectricCurrent implements Quantity
{
    use QuantityHelper;

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): string
    {
        return "I";
    }

    protected static function getInitialUnit(): Unit
    {
        return Ampere::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\ElectricCurrent::class;
    }
}
