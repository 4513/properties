<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Prefixes\Mega;

/**
 * Class MegaMole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MegaMole extends Mole
{
    use Mega;
}
