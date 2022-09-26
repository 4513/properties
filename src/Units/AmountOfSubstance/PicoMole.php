<?php

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PicoMole extends Mole
{
    use Pico;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
