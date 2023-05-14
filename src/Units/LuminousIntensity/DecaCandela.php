<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Prefixes\Deca;

/**
 * Class DecaCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class DecaCandela extends Candela
{
    use Deca;
}
