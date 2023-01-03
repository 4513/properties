<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Femto;

/**
 * Class FemtoMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class FemtoMole extends Mole
{
    use Femto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
