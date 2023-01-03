<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deci;

/**
 * Class SquareDeciMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareDeciMeter extends SquareMeter
{
    use Deci;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
