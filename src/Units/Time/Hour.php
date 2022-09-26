<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Time;

/**
 * Class Hour
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Hour extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "hour";

    /** @inheritdoc */
    protected string $symbol = "h";

    /** @inheritdoc */
    protected int|float $multiplier = 3600;

    protected const QUANTITY = Time::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
