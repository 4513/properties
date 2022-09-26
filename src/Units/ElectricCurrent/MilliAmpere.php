<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MilliAmpere extends Ampere
{
    use Milli;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
