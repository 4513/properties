<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Nano;

/**
 * Class CubicNanoMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicNanoMeter extends CubicMeter
{
    use Nano;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
