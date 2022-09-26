<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class DegreeReaumur
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DegreeReaumur extends NumericalUnit
{
    /** @inheritdoc */
    protected string $name = "degree Reaumur";

    /** @inheritdoc */
    protected string $symbol = "°Re";

    /** @inheritdoc */
    protected int|float $multiplier = (-273.15)*(4/5);

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
