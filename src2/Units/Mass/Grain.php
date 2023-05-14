<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\EnglishUnit;
use MiBo\Properties\Traits\ImperialUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\UnitForMass;
use MiBo\Properties\Traits\UnitHelper;
use MiBo\Properties\Traits\USCustomaryUnit;

/**
 * Class Grain
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Grain implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use ImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use USCustomaryUnit;
    use EnglishUnit;
    use UnitHelper;
    use UnitForMass;
    use NotAcceptedBySIUnit;

    protected string $name = "grain";

    protected string $symbol = "gr";

    protected int $multiplier = -15;
}
