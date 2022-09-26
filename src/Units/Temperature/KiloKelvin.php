<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Kilo;

/**
 * Class KiloKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class KiloKelvin extends Kelvin
{
    use Kilo;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
