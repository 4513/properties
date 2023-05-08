<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Traits\InternationalSystemUnit;
use MiBo\Properties\Traits\MetricUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Meter
 *
 *  The metre (or meter in American English) is the base unit of length in the International System of
 * Units (SI).
 *  The metre was originally defined in 1793 as one ten-millionth of the distance from the equator to the
 * North Pole. In 1799, it was redefined in terms of a prototype metre bar (the actual bar used was changed
 * in 1889). In 1960, the metre was redefined in terms of a certain number of wavelengths of a certain
 * emission line of krypton-86.
 *  The current definition was adopted in 1983 and modified slightly in 2002 to clarify that the metre is
 * a proper length measurement. From 1983 until 2019, the metre was defined as the length of the path traveled
 * by light in vacuum during a time interval of 1/299,792,458 of a second. After the 2019 redefinition of SI
 * base units, this definition was rephrased to include the definition of a second in terms of the caesium
 * frequency.
 *
 * @link https://en.wikipedia.org/wiki/Metre
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Meter implements NumericalUnit
{
    use InternationalSystemUnit;
    use NotImperialUnit;
    use MetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper;
    use UnitForLength;

    protected string $name = "meter";

    protected string $symbol = "m";

    final protected function __construct()
    {
    }
}
