<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PicoAmpere extends Ampere
{
    use Pico;
}
