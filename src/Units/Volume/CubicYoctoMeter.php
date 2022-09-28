<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class CubicYoctoMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicYoctoMeter extends CubicMeter
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
