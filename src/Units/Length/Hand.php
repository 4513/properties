<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

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
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Hand extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "hand";

    /** @inheritdoc */
    protected string $symbol = "hh";

    /** @inheritdoc */
    protected int|float $multiplier = 1016*(10**-4);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
