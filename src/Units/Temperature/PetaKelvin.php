<?php

namespace MiBo\Properties\Units\Temperature;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Peta;

/**
 * Class PetaKelvin
 *
 * @package MiBo\Properties\Units\Temperature
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PetaKelvin extends Kelvin
{
    use Peta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
