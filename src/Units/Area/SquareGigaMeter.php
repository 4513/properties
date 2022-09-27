<?php

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class SquareGigaMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareGigaMeter extends SquareMeter
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
