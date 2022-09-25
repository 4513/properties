<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Tera;

/**
 * Class TeraSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class TeraSecond extends Second
{
    use Tera;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
