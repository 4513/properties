<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class HectoGram extends Gram
{
    use Hecto;
}
