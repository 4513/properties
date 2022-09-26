<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Nano;

/**
 * Class NanoAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NanoAmpere extends Ampere
{
    use Nano;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
