<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yotta;

/**
 * Class YottaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YottaSecond extends Second
{
    use Yotta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
