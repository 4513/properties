<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Acceleration;

use MiBo\Properties\Contracts\Unit;

/**
 * Class FootPerSecondSquared
 *
 * @package MiBo\Properties\Units\Acceleration
 */
class FootPerSecondSquared extends MeterPerSecondSquared
{
    protected string $name = "foot per second squared";

    protected string $symbol = "ft/s^2";

    protected float $multiplier = 304_800*(10**-6);

    protected static ?Unit $instance = null;

    public function isSI(): bool
    {
        return false;
    }
}
