<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\LuminousIntensity\Candela;

/**
 * Class LuminousIntensity
 *
 * @package MiBo\Properties\Quantities
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class LuminousIntensity implements Quantity
{
    public function getDefaultUnit(): Unit
    {
        return Candela::get();
    }

    public function getSymbol(): string
    {
        return "J";
    }
}
