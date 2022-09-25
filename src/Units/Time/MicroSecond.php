<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MicroSecond extends Second
{
    use Micro;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
