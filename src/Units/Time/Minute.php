<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\AcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForTime;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Minute
 *
 * @package MiBo\Properties\Units\Time
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Minute implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForTime;
    use AcceptedBySIUnit;

    protected string $name = "minute";

    protected string $symbol = "min";
}
