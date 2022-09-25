<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PicoMeter extends Meter
{
    use Pico;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
