<?php

namespace MiBo\Properties\Units\Acceleration;

use MiBo\Properties\Contracts\Unit;

/**
 * Class Gal
 *
 * @package MiBo\Properties\Units\Acceleration
 */
class Gal extends MeterPerSecondSquared
{
    protected string $name = "gal";

    protected string $symbol = "gal";

    protected float $multiplier = 0.01;

    protected static ?Unit $instance = null;

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function isSI(): bool
    {
        return false;
    }
}
