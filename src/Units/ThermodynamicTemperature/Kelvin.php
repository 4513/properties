<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\ThermodynamicTemperature;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\InternationalSystemUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForElectricCurrent;
use MiBo\Properties\Traits\UnitForThermodynamicTemperature;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Kelvin
 *
 * @package MiBo\Properties\Units\ThermodynamicTemperature
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Kelvin implements NumericalUnit
{
    use InternationalSystemUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForThermodynamicTemperature;

    protected string $name = "kelvin";

    protected string $symbol = "K";
}
