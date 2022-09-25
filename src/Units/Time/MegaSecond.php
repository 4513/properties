<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Mega;

/**
 * Class MegaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MegaSecond extends Second
{
    use Mega;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
