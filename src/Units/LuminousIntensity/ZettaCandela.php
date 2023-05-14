<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Prefixes\Zetta;

/**
 * Class ZettaCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ZettaCandela extends Candela
{
    use Zetta;
}
