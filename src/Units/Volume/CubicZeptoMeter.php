<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zepto;

/**
 * Class CubicZeptoMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicZeptoMeter extends CubicMeter
{
    use Zepto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
