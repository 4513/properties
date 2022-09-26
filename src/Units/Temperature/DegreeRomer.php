<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class DegreeRomer
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DegreeRomer extends NumericalUnit
{
    /** @inheritdoc */
    protected string $name = "degree Romer";

    /** @inheritdoc */
    protected string $symbol = "°Rø";

    /** @inheritdoc */
    protected int|float $multiplier = (-273.15)*(100/52.5)+7.5;

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
