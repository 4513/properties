<?php

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectoMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class HectoMole extends Mole
{
    use Hecto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
