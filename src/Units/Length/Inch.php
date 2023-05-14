<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Traits\EnglishUnit;
use MiBo\Properties\Traits\ImperialUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitHelper;
use MiBo\Properties\Traits\USCustomaryUnit;

/**
 * Class Inch
 *
 *  The Inch is a unit of length in the British imperial and
 * the United States customary systems of measurement.
 *
 * It is equal to 1/36 yard or 1/12 of a foot.
 *
 *  Derived from the Roman uncia, the word inch is also sometimes
 * used to translate similar units in other measurement systems,
 * usually understood as deriving from the width of the human
 * thumb.
 *
 *  Standards for the exact length of an inch have varied in the
 * past, but since the adoption of the international yard during
 * the 1950s and 1960s the inch has been based on the metric
 * system and defined as exactly 25.4 mm.
 *
 * @link https://en.wikipedia.org/wiki/Inch
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Inch implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotAcceptedBySIUnit;
    use ImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use USCustomaryUnit;
    use EnglishUnit;
    use UnitHelper;
    use UnitForLength;

    protected string $name = "inch";

    protected string $symbol = "in";

    protected int|float $multiplier = -4;
}
