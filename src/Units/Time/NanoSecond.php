<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Nano;

/**
 * Class NanoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NanoSecond extends Second
{
    use Nano;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
