<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Ton
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Ton extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "ton";

    /** @inheritdoc */
    protected string $symbol = "t";

    /** @inheritdoc */
    protected int|float $multiplier = 1_016_046_908_800*(10**-6);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
