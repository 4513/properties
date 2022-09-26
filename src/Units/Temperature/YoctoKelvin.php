<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class YoctoKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YoctoKelvin extends Kelvin
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
