<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yotta;

/**
 * Class SquareYottaMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareYottaMeter extends SquareMeter
{
    use Yotta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
