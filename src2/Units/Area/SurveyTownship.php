<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitHelper;
use MiBo\Properties\Traits\USCustomaryUnit;

/**
 * Class SurveyTownship
 *
 * @package MiBo\Properties\Units\Area
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class SurveyTownship implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotAcceptedBySIUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use USCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForLength;

    protected string $name = "survey township";

    protected string $symbol = "twp.";

    protected int $multiplier = 93_239_930;

    final protected function __construct()
    {
    }
}