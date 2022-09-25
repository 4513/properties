<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deci;

/**
 * Class DeciSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DeciSecond extends Second
{
    use Deci;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
