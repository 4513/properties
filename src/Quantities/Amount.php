<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Amount\Piece;

/**
 * Class Amount
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Amount implements Quantity
{
    use QuantityHelper;

    protected static string $quantityName = "amount";

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): ?string
    {
        return "AMOUNT";
    }

    /**
     * @inheritDoc
     */
    protected static function getInitialUnit(): Unit
    {
        return Piece::get();
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\Amount::class;
    }
}
