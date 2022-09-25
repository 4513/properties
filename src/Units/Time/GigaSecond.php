<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class GigaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class GigaSecond extends Second
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
