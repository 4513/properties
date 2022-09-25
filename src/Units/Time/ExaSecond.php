<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Exa;

/**
 * Class ExaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ExaSecond extends Second
{
    use Exa;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
