<?php

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Kilo;

/**
 * Class SquareKiloMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareKiloMeter extends SquareMeter
{
    use Kilo;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
