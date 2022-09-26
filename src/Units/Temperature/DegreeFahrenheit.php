<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class DegreeFahrenheit
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DegreeFahrenheit extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "degree Fahrenheit";

    /** @inheritdoc */
    protected string $symbol = "°F";

    /** @inheritdoc */
    protected int|float $multiplier = (5/9)*(45_967*(10**-2));

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
