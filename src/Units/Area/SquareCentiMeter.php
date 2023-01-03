<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Centi;

/**
 * Class SquareCentiMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareCentiMeter extends SquareMeter
{
    use Centi;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
