<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Mega;

/**
 * Class MegaKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MegaKelvin extends Kelvin
{
    use Mega;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
