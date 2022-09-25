<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Grain
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Grain extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "grain";

    /** @inheritdoc */
    protected string $symbol = "gr";

    /** @inheritdoc */
    protected int|float $multiplier = 64_798_970*(10**-9);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
