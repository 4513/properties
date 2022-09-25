<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Hundredweight
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Hundredweight extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "hundredweight";

    /** @inheritdoc */
    protected string $symbol = "cwt";

    /** @inheritdoc */
    protected int|float $multiplier = 50_802_345_440*(10**-6);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
