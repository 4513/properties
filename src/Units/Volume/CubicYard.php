<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Suffixes\Cubic;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\UnitForVolume;
use MiBo\Properties\Units\Length\Yard;

/**
 * Class CubicYard
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class CubicYard extends Yard
{
    use Cubic;
    use NotEnglishUnit;
    use UnitForVolume;
}
