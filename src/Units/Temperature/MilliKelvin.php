<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MilliKelvin extends Kelvin
{
    use Milli;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
