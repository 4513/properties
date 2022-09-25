<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Dalton
 *
 * @deprecated One should note that the multiplier might not be true.
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Dalton extends Unit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "dalton";

    /** @inheritdoc */
    protected string $symbol = "Da";

    /** @inheritdoc */
    protected int|float $multiplier = 1_660_539_040*(10**-24);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
