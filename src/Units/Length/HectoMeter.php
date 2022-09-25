<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class HectoMeter extends Meter
{
    use Hecto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
