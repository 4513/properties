<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Stone
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Stone extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "stone";

    /** @inheritdoc */
    protected string $symbol = "st";

    /** @inheritdoc */
    protected int|float $multiplier = 6_350_293_180*(10**-6);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
