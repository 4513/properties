<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Traits\AcceptedBySIUnit;
use MiBo\Properties\Traits\InternationalSystemUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class AstronomicalUnit
 *
 *  The astronomical unit (symbol: au, ua, or AU) is a unit of length, roughly the distance from Earth to
 * the Sun and equal to about 150 million kilometres (93 million miles) or 8.3 light-minutes. The actual
 * distance from Earth to the Sun varies by about 3 % as Earth orbits the Sun, from a maximum (aphelion) to
 * a minimum (perihelion) and back again once each year. The astronomical unit originally conceived as the
 * average of Earth's aphelion and perihelion; however, since 2012 it has been defined as exactly
 * 149 597 870 700 meters.
 *  The astronomical unit is used primarily for measuring distances within the Solar System or around other
 * stars. It is also a fundamental component in the definition of another unit of astronomical length, the
 * parsec.
 *
 * @link https://en.wikipedia.org/wiki/Astronomical_unit
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class AstronomicalUnit implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use AcceptedBySIUnit;
    use NotMetricUnit;
    use NotImperialUnit;
    use \MiBo\Properties\Traits\AstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForLength;

    protected string $name = "astronomical unit";

    protected string $symbol = "au";
}
