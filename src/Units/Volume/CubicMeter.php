<?php

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Suffixes\Cubic;
use MiBo\Properties\Units\Length\Meter;

/**
 * Class CubicMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CubicMeter extends Meter
{
    use Cubic;

    protected const QUANTITY = Volume::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
