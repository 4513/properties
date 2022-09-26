<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Barleycorn
 *
 *  The barleycorn is a former English unit of length equal
 * to 1/3 of an inch. It is still used as the basic of shoe
 * sizes in English-speaking countries.
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Barleycorn extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "barleycorn";

    /** @inheritdoc */
    protected string $symbol = "";

    /** @inheritdoc */
    protected int|float $multiplier = 84667*(10**-7);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
