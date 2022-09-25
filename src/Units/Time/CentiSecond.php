<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Centi;

/**
 * Class CentiSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CentiSecond extends Second
{
    use Centi;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
