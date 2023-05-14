<?php

declare(strict_types = 1);

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\DerivedQuantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\QuantityHelper;
use MiBo\Properties\Units\Area\SquareMeter;

/**
 * Class Area
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Area implements DerivedQuantity
{
    use QuantityHelper;

    public static function getDimensionSymbol(): ?string
    {
        return "A";
    }

    public static function getEquations(): array
    {
        return [Length::class . " * " . Length::class];
    }

    protected static function getInitialUnit(): Unit
    {
        return SquareMeter::get();
    }

    public static function getDefaultProperty(): string
    {
        return \MiBo\Properties\Area::class;
    }
}
