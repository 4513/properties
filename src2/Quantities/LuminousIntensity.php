<?php

declare(strict_types = 1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\LuminousIntensity\Candela;

/**
 * Class LuminousIntensity
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class LuminousIntensity implements Quantity
{
    use QuantityHelper;

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): string
    {
        return "J";
    }

    protected static function getInitialUnit(): Unit
    {
        return Candela::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\LuminousIntensity::class;
    }
}
