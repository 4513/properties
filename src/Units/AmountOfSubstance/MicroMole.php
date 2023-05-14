<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MicroMole extends Mole
{
    use Micro;
}
