<?php

namespace MiBo\Properties\Quantities;

use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\Time\Second;

/**
 * Class Time
 *
 * @package MiBo\Properties\Quantities
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Time implements Quantity
{
    public function getDefaultUnit(): Unit
    {
        return Second::get();
    }

    public function getSymbol(): string
    {
        return "t";
    }
}
