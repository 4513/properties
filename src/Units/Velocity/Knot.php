<?php

namespace MiBo\Properties\Units\Velocity;

use MiBo\Properties\Contracts\Unit;

/**
 * Class Knot
 *
 * @package MiBo\Properties\Units\Velocity
 */
class Knot extends MeterPerSecond
{
    protected string $name = "knot";

    protected string $symbol = "kn";

    protected float $multiplier = 1_943_800*(10**-6);

    protected static ?Unit $instance = null;

    public function isSI(): bool
    {
        return false;
    }
}
