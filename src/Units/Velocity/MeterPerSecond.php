<?php

namespace MiBo\Properties\Units\Velocity;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Velocity;

/**
 * Class MeterPerSecond
 *
 * @package MiBo\Properties\Units\Velocity
 */
class MeterPerSecond extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "meter per second";

    /** @inheritdoc */
    protected string $symbol = "m/s";

    protected const QUANTITY = Velocity::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
