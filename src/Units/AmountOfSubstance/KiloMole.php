<?php

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Kilo;

/**
 * Class KiloMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class KiloMole extends Mole
{
    use Kilo;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
