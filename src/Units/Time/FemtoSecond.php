<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Femto;

/**
 * Class FemtoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class FemtoSecond extends Second
{
    use Femto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
