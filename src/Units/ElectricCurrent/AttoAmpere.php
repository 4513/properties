<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Atto;

/**
 * Class AttoAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AttoAmpere extends Ampere
{
    use Atto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
