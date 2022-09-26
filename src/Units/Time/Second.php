<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Time;

/**
 * Class Second
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Second extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "second";

    /** @inheritdoc */
    protected string $symbol = "s";

    protected const QUANTITY = Time::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
