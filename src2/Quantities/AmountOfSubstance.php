<?php

declare(strict_types = 1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Traits\QuantityHelper;

/**
 * Class AmountOfSubstance
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class AmountOfSubstance implements Quantity
{
    use QuantityHelper;

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): string
    {
        return "t";
    }

    protected static function getInitialUnit(): Unit
    {
        return A::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\AmountOfSubstance::class;
    }
}
