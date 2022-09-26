<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zetta;

/**
 * Class ZettaKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZettaKelvin extends Kelvin
{
    use Zetta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
