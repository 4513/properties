<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zetta;

/**
 * Class ZettaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZettaSecond extends Second
{
    use Zetta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
