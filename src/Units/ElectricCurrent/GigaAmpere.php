<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class GigaAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class GigaAmpere extends Ampere
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
