<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\ElectricCurrent\Ampere;

/**
 * Class ElectricCurrent
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ElectricCurrent implements Quantity
{
    public function getDefaultUnit(): Unit
    {
        return Ampere::get();
    }

    public function getSymbol(): string
    {
        return "I";
    }
}
