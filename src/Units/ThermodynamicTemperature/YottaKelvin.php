<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\ThermodynamicTemperature;

use MiBo\Properties\Prefixes\Yotta;

/**
 * Class YottaKelvin
 *
 * @package MiBo\Properties\Units\ThermodynamicTemperature
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class YottaKelvin extends Kelvin
{
    use Yotta;
}
