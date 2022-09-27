<?php

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class SquareYoctoMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareYoctoMeter extends SquareMeter
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
