<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

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
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Inch extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "inch";

    /** @inheritdoc */
    protected string $symbol = "in";

    /** @inheritdoc */
    protected int|float $multiplier = 254*(10**-4);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
