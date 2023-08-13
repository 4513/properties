<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Mass\KiloGram;

/**
 * Class Mass
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Mass implements Quantity
{
    use QuantityHelper;

    protected static string $quantityName = "mass";

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): string
    {
        return "m";
    }

    protected static function getInitialUnit(): Unit
    {
        return KiloGram::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\Mass::class;
    }
}
