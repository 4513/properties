<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Volume;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\UnitForVolume;
use MiBo\Properties\Traits\UnitHelper;
use MiBo\Properties\Traits\USCustomaryUnit;

/**
 * Class USGill
 *
 * @package MiBo\Properties\Units\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class USGill implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotAcceptedBySIUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use USCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForVolume;

    protected string $name = "gill";

    protected string $symbol = "gi";

    protected float $multiplier = 11_829_411_825 * (10 ** -15);

    final protected function __construct()
    {
    }
}
