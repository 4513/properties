<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MilliGram extends Gram
{
    use Milli;
}
