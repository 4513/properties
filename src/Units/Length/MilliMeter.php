<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MilliMeter extends Meter
{
    use Milli;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
