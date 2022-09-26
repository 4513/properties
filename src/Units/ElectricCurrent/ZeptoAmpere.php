<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zepto;

/**
 * Class ZeptoAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZeptoAmpere extends Ampere
{
    use Zepto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
