<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\IsDerived;
use MiBo\Properties\Contracts\Unit;

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

    }

    public function getSymbol(): string
    {
        return "V";
    }
}
