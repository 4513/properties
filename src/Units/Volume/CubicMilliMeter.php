<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Prefixes\Centi;
use MiBo\Properties\Prefixes\Milli;

/**
 * Class CubicMilliMeter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class CubicMilliMeter extends CubicMeter
{
    use Milli;
}
