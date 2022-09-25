<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Kilo;

/**
 * Class KiloSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class KiloSecond extends Second
{
    use Kilo;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
