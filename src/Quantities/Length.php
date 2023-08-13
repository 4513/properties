<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Length\Meter;

/**
 * Class Length
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Length implements Quantity
{
    use QuantityHelper;

    protected static string $quantityName = "length";

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): string
    {
        return "L";
    }

    protected static function getInitialUnit(): Unit
    {
        return Meter::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\Length::class;
    }
}
