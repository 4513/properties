<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PicoSecond extends Second
{
    use Pico;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
