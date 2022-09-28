<?php

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Suffixes\Cubic;
use MiBo\Properties\Units\Length\Meter;

/**
 * Class SquareMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareMeter extends Meter
{
    use Cubic;

    protected const QUANTITY = Area::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
