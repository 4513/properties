<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Pound
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Pound extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "pound";

    /** @inheritdoc */
    protected string $symbol = "lb";

    /** @inheritdoc */
    protected int|float $multiplier = 453_592_370*(10**-6);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
