<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PicoKelvin extends Kelvin
{
    use Pico;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
