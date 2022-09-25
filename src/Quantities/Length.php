<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\Length\Meter;

/**
 * Class Length
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Length implements Quantity
{
    public function getDefaultUnit(): Unit
    {
        return Meter::get();
    }

    public function getSymbol(): string
    {
        return "l";
    }
}
