<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class GigaKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class GigaKelvin extends Kelvin
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
