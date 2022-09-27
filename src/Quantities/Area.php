<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Derived;
use MiBo\Properties\Contracts\IsDerived;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\Area\SquareMeter;

/**
 * Class Area
 *
 * @package MiBo\Properties\Quantities
 */
class Area implements Derived
{
    use IsDerived;

    protected array $requiredQuantities = [
        Length::class,
    ];

    public function getDefaultUnit(): Unit
    {
        return SquareMeter::get();
    }

    public function getSymbol(): string
    {
        return "A";
    }
}
