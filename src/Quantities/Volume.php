<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\IsDerived;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\Volume\CubicMeter;

/**
 * Class Volume
 *
 * @package MiBo\Properties\Quantities
 */
class Volume implements Derived
{
    use IsDerived;

    protected array $requiredQuantities = [
        Length::class,
    ];

    public function getDefaultUnit(): Unit
    {
        return CubicMeter::get();
    }

    public function getSymbol(): string
    {
        return "V";
    }
}
