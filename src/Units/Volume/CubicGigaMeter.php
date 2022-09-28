<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class CubicGigaMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicGigaMeter extends CubicMeter
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
