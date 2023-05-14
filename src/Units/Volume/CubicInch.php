<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Suffixes\Cubic;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\UnitForVolume;
use MiBo\Properties\Units\Length\Inch;

/**
 * Class CubicInch
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class CubicInch extends Inch
{
    use Cubic;
    use NotEnglishUnit;
    use UnitForVolume;
}
