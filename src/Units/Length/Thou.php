<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Thou
 *
 *  A thousandth of an inch is derived unit of length in a system
 * of units using inches. Equal to 1/1000 of an inch, a thousandth
 * is commonly called a thou or particularly in North America a mil.
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Thou extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "thou";

    /** @inheritdoc */
    protected string $symbol = "th";

    /** @inheritdoc */
    protected int|float $multiplier = 254*(10**-7);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
