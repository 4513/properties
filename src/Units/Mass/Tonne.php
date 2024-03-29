<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\AcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForMass;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Tonne
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Tonne implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForMass;
    use AcceptedBySIUnit;

    protected string $name = "tonne";

    protected string $symbol = "t";

    protected int $multiplier = 6;
}
