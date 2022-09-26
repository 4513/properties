<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Chain
 *
 *  The chain is a unit of length equal to 66 feet (22 yards).
 * It is subdivided into 100 links or 4 rods.
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Chain extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "chain";

    /** @inheritdoc */
    protected string $symbol = "ch";

    /** @inheritdoc */
    protected int|float $multiplier = 201168*(10**-4);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
