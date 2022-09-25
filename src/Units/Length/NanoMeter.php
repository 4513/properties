<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Nano;

/**
 * Class NanoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NanoMeter extends Meter
{
    use Nano;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
