<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MicroMeter extends Meter
{
    use Micro;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
