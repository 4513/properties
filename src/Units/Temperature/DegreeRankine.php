<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class DegreeRankine
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DegreeRankine extends NumericalUnit
{
    /** @inheritdoc */
    protected string $name = "degree Rankine";

    /** @inheritdoc */
    protected string $symbol = "°R";

    /** @inheritdoc */
    protected int|float $multiplier = 5/9;

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
