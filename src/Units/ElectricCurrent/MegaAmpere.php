<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Mega;

/**
 * Class MegaAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MegaAmpere extends Ampere
{
    use Mega;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
