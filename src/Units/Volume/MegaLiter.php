<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Prefixes\Mega;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;

/**
 * Class MegaLiter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class MegaLiter extends Liter
{
    use NotAcceptedBySIUnit;
    use Mega;
}
