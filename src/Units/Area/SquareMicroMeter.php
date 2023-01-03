<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Micro;

/**
 * Class SquareMicroMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class SquareMicroMeter extends SquareMeter
{
    use Micro;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
