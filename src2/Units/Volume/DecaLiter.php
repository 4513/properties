<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Prefixes\Deca;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;

/**
 * Class DecaLiter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class DecaLiter extends Liter
{
    use NotAcceptedBySIUnit;
    use Deca;
}
