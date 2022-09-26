<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Drachm
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Drachm extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "drachm";

    /** @inheritdoc */
    protected string $symbol = "dr";

    /** @inheritdoc */
    protected int|float $multiplier = 1_771_845_195_312_500*(10**-15);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
