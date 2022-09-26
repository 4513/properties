<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Tonne
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Tonne extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "tonne";

    /** @inheritdoc */
    protected string $symbol = "t";

    /** @inheritdoc */
    protected int|float $multiplier = 10**6;

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
