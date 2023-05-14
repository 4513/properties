<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Prefixes\Nano;

/**
 * Class NanoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class NanoMeter extends Meter
{
    use Nano;
}
