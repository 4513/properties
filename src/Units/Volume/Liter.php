<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\AcceptedBySIUnit;
use MiBo\Properties\Traits\MetricUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForVolume;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Liter
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Liter implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use AcceptedBySIUnit;
    use NotImperialUnit;
    use MetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForVolume;

    protected string $name = "liter";

    protected string $symbol = "l";

    protected int $multiplier = -3;
}
