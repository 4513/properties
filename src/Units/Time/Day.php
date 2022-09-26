<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Time;

/**
 * Class Day
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Day extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "day";

    /** @inheritdoc */
    protected string $symbol = "d";

    /** @inheritdoc */
    protected int|float $multiplier = 864000;

    protected const QUANTITY = Time::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
