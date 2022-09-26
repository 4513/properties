<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Temperature;

/**
 * Class Kelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Kelvin extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "kelvin";

    /** @inheritdoc */
    protected string $symbol = "K";

    protected const QUANTITY = Temperature::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
