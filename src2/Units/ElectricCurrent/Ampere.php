<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\InternationalSystemUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForAmountOfSubstance;
use MiBo\Properties\Traits\UnitForElectricCurrent;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Ampere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Ampere implements NumericalUnit
{
    use InternationalSystemUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForElectricCurrent;

    protected string $name = "ampere";

    protected string $symbol = "A";
}
