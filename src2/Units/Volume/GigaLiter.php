<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Prefixes\Giga;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;

/**
 * Class GigaLiter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class GigaLiter extends Liter
{
    use NotAcceptedBySIUnit;
    use Giga;
}
