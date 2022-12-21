<?php

namespace MiBo\Properties\Units\Velocity;

use MiBo\Properties\Contracts\Unit;

/**
 * Class FootPerSecond
 *
 * @package MiBo\Properties\Units\Velocity
 */
class FootPerSecond extends MeterPerSecond
{
    protected string $name = "foot per second";

    protected string $symbol = "ft/s";

    protected float $multiplier = 3_280_800*(10**-6);

    protected static ?Unit $instance = null;

    public function isSI(): bool
    {
        return false;
    }
}
