<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Femto;

/**
 * Class FemtoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class FemtoMeter extends Meter
{
    use Femto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
