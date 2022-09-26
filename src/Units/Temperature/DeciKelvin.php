<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deci;

/**
 * Class DeciKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DeciKelvin extends Kelvin
{
    use Deci;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
