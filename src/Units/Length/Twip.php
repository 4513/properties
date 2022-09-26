<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Twip
 *
 *  A twip is a typographical measurement, defined as 1/20 of a
 * typographical point. One twip is 1/1440 inch, or 17.64 μm.
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Twip extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "twip";

    /** @inheritdoc */
    protected string $symbol = "";

    /** @inheritdoc */
    protected int|float $multiplier = 176389*(10**-10);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
