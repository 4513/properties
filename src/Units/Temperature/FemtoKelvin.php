<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Femto;

/**
 * Class FemtoKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class FemtoKelvin extends Kelvin
{
    use Femto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
