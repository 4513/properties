<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class YoctoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YoctoMeter extends Meter
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
