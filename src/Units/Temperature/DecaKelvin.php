<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deca;

/**
 * Class DecaKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DecaKelvin extends Kelvin
{
    use Deca;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
