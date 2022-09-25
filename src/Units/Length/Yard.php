<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Yard
 *
 *  The yard is an English unit of length in both the British
 * imperial and US customary systems of measurement equalling
 * 3 feet or 36 inches. Since 1959 it has been by international
 * agreement standardized as exactly 0.9144 meter. A distance
 * of 1,760 yard is equal to 1 mile.
 *
 * The US survey yard is very slightly longer.
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Yard extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "yard";

    /** @inheritdoc */
    protected string $symbol = "yd";

    /** @inheritdoc */
    protected int|float $multiplier = 9144*(10**-4);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
