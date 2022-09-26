<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class DegreeCelsius
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DegreeCelsius extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "degree Celsius";

    /** @inheritdoc */
    protected string $symbol = "°C";

    /** @inheritdoc */
    protected int|float $multiplier = 27_315*(10**-2);

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
