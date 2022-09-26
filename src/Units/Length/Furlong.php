<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Furlong
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Furlong extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "furlong";

    /** @inheritdoc */
    protected string $symbol = "fur";

    /** @inheritdoc */
    protected int|float $multiplier = 201168*(10**-3);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
