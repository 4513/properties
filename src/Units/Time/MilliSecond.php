<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MilliSecond extends Second
{
    use Milli;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
