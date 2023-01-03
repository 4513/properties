<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zepto;

/**
 * Class ZeptoMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZeptoMole extends Mole
{
    use Zepto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
