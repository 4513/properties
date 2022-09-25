<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zepto;

/**
 * Class ZeptoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZeptoSecond extends Second
{
    use Zepto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
