<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectAre
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class HectAre extends Are
{
    use Hecto,
        IsSI;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
