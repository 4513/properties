<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Acceleration;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Centi;

/**
 * Class CentiMeterPerSecondSquared
 *
 * @package MiBo\Properties\Units\Acceleration
 */
class CentiMeterPerSecondSquared extends MeterPerSecondSquared
{
    use Centi;

    protected static ?Unit $instance = null;
}
