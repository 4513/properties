<?php

namespace MiBo\Properties\Units\Velocity;

use MiBo\Properties\Contracts\Unit;

/**
 * Class KiloMeterPerHour
 *
 * @package MiBo\Properties\Units\Velocity
 */
class KiloMeterPerHour extends MeterPerSecond
{
    protected string $symbol = "km/h";

    protected string $name = "kilometer per hour";

    protected float $multiplier = 3.6;

    protected static ?Unit $instance = null;

    public function isSI(): bool
    {
        return false;
    }
}
