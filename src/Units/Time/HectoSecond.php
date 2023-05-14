<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class HectoSecond extends Second
{
    use Hecto;
}
