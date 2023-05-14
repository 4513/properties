<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Prefixes\Kilo;

/**
 * Class SquareKiloMeter
 *
 * @package MiBo\Properties\Units\Area
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class SquareKiloMeter extends SquareMeter
{
    use Kilo;
}
