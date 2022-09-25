<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Kilo;

/**
 * Class KiloMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class KiloMeter extends Meter
{
    use Kilo;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
