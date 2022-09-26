<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class DegreeNewton
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DegreeNewton extends NumericalUnit
{
    /** @inheritdoc */
    protected string $name = "degree Newton";

    /** @inheritdoc */
    protected string $symbol = "°Rø";

    /** @inheritdoc */
    protected int|float $multiplier = (-273.15)*(33/100);

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
