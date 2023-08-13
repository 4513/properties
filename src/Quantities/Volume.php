<?php

declare(strict_types=1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\DerivedQuantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Volume\CubicMeter;

/**
 * Class Volume
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Volume implements DerivedQuantity
{
    use QuantityHelper;

    protected static string $quantityName = "volume";

    /**
     * @inheritDoc
     */
    public static function getEquations(): array
    {
        return [Area::class . " * " . Length::class];
    }

    /**
     * @inheritDoc
     */
    public static function getDimensionSymbol(): ?string
    {
        return "V";
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\Volume::class;
    }

    protected static function getInitialUnit(): Unit
    {
        return CubicMeter::get();
    }
}
