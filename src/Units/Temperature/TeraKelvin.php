<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Tera;

/**
 * Class TeraKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class TeraKelvin extends Kelvin
{
    use Tera;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
