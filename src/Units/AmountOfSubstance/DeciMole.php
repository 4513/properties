<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deci;

/**
 * Class DeciMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DeciMole extends Mole
{
    use Deci;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
