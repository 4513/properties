<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MicroSecond extends Second
{
    use Micro;
}
