<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deca;

/**
 * Class DecaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DecaSecond extends Second
{
    use Deca;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
