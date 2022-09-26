<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Nano;

/**
 * Class NanoKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NanoKelvin extends Kelvin
{
    use Nano;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
