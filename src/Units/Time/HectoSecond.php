<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class HectoSecond extends Second
{
    use Hecto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
