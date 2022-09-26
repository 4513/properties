<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Ounce
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Ounce extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "ounce";

    /** @inheritdoc */
    protected string $symbol = "oz";

    /** @inheritdoc */
    protected int|float $multiplier = 28_349_523_125*(10**-9);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
