<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\ThermodynamicTemperature;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForThermodynamicTemperature;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class DegreeRankine
 *
 * @package MiBo\Properties\Units\ThermodynamicTemperature
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class DegreeRankine implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForThermodynamicTemperature;
    use NotAcceptedBySIUnit;

    protected string $name = "degree Rankine";

    protected string $symbol = "°R";
}
