<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\AmountOfSubstance\Mole;

/**
 * Class AmountOfSubstance
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AmountOfSubstance implements Quantity
{
    public function getDefaultUnit(): Unit
    {
        return Mole::get();
    }

    public function getSymbol(): string
    {
        return "n";
    }
}
