<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Prefixes\Kilo;

/**
 * Class KiloCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class KiloCandela extends Candela
{
    use Kilo;
}
