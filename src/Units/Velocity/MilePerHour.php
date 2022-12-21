<?php

namespace MiBo\Properties\Units\Velocity;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;

/**
 * Class MilePerHour
 *
 * @package MiBo\Properties\Units\Velocity
 */
class MilePerHour extends MeterPerSecond
{
    use IsImperial;

    protected string $symbol = "mph";

    protected string $name = "mile per hour";

    protected float $multiplier = 2_236_900*(10**-6);

    protected static ?Unit $instance = null;

    public function isSI(): bool
    {
        return false;
    }
}
