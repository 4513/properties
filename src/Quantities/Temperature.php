<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\Temperature\Kelvin;

/**
 * Class Temperature
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Temperature implements Quantity
{
    public function getDefaultUnit(): Unit
    {
        return Kelvin::get();
    }

    public function getSymbol(): string
    {
        return "T";
    }
}
