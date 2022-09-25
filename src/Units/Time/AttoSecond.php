<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Atto;

/**
 * Class AttoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AttoSecond extends Second
{
    use Atto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
