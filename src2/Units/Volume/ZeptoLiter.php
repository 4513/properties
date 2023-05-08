<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Prefixes\Zepto;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;

/**
 * Class ZeptoLiter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ZeptoLiter extends Liter
{
    use NotAcceptedBySIUnit;
    use Zepto;
}
