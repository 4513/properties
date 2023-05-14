<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MilliMeter extends Meter
{
    use Milli;
}
