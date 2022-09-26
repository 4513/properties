<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Exa;

/**
 * Class ExaKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ExaKelvin extends Kelvin
{
    use Exa;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
