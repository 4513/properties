<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\PerUnit\PerNotSpecified;
use MiBo\Properties\Units\Pure\NoUnit;

/**
 * Class PerUnit
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PerUnit implements Quantity
{
    use QuantityHelper;

    protected static string $quantityName = "per-unit";

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): ?string
    {
        return "PERUNIT";
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\PerUnit::class;
    }

    /**
     * @inheritDoc
     */
    protected static function getInitialUnit(): Unit
    {
        return PerNotSpecified::get(NoUnit::get(), NoUnit::get());
    }
}
