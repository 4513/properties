<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Centi;

/**
 * Class CentiMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CentiMeter extends Meter
{
    use Centi;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
