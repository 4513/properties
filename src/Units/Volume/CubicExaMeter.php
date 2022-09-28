<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Exa;

/**
 * Class CubicExaMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicExaMeter extends CubicMeter
{
    use Exa;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
