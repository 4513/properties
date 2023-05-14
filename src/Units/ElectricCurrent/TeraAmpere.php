<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Prefixes\Tera;

/**
 * Class TeraAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class TeraAmpere extends Ampere
{
    use Tera;
}
