<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\EnglishUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Barleycorn
 *
 *  The barleycorn is a former English unit of length equal
 * to 1/3 of an inch. It is still used as the basic of shoe
 * sizes in English-speaking countries.
 *
 * @link https://en.wikipedia.org/wiki/Barleycorn_(unit)
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Barleycorn implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotAcceptedBySIUnit;
    use NotMetricUnit;
    use NotImperialUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use EnglishUnit;
    use UnitHelper;
    use UnitForLength;

    protected string $name = "barleycorn";

    protected string $symbol = "";

    protected float $multiplier = 84_667 * (10 ** -7);

    final protected function __construct()
    {
    }
}
