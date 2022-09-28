<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Suffixes\Cubic;

/**
 * Class CubicMegaMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicMegaMeter extends CubicMeter
{
    use Cubic;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
