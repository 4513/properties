<?php

namespace MiBo\Properties\Units\Acceleration;

use MiBo\Properties\Contracts\Unit;

/**
 * Class StandardGravity
 *
 * @package MiBo\Properties\Units\Acceleration
 */
class StandardGravity extends MeterPerSecondSquared
{
    protected string $name = "standard gravity";

    protected string $symbol = "g0";

    protected float $multiplier = 101_972*(10**-8);

    protected static ?Unit $instance = null;

    public function isSI(): bool
    {
        return false;
    }
}
