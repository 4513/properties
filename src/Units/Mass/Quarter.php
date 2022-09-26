<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Quarter
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Quarter extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "quarter";

    /** @inheritdoc */
    protected string $symbol = "qr";

    /** @inheritdoc */
    protected int|float $multiplier = 12_700_586_360*(10**-6);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
