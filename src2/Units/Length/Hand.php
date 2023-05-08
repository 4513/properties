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
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitForLength;
use MiBo\Properties\Traits\UnitHelper;

/**
 * Class Hand
 *
 *  The hand is a non-SI unit of measurement of length standardized
 * to 4 in.
 *
 *  It is used to measure the height of horses in English-speaking
 * countries, including Australia, Canada, the Republic of Ireland,
 * the United Kingdom, and the United States.
 *
 *  It was originally based on the breadth of a human hand. The
 * adoption of the international inch in 1959 allowed for a
 * standardized imperial form and a metric conversion. It may be
 * abbreviated to "h" or "hh". Although measurements between whole
 * hands are usually expressed in what appears to be decimal format,
 * the subdivision of the hand is not decimal but is in base 4, so
 * subdivisions after the radix point are in quarters of a hand,
 * which are inches. Thus, 62 inches is fifteen and a half hands,
 * or 15.2 hh.
 *
 * @link https://en.wikipedia.org/wiki/Hand_(unit)
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Hand implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotAcceptedBySIUnit;
    use ImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use EnglishUnit;
    use UnitHelper;
    use UnitForLength;

    protected string $name = "hand";

    protected string $symbol = "hh";

    protected int|float $multiplier = 1_016 * (10 ** -4);

    final protected function __construct()
    {
    }
}
