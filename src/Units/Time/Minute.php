<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Time;

/**
 * Class Minute
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Minute extends Unit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "minute";

    /** @inheritdoc */
    protected string $symbol = "min";

    /** @inheritdoc */
    protected int|float $multiplier = 60;

    protected const QUANTITY = Time::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
