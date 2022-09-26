<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Peta;

/**
 * Class PetaAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PetaAmpere extends Ampere
{
    use Peta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
