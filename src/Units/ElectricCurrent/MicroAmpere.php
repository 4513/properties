<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MicroAmpere extends Ampere
{
    use Micro;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
