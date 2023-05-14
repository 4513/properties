<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroAmpere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MicroAmpere extends Ampere
{
    use Micro;
}
