<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Mile
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Mile extends NumericalUnit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "mile";

    /** @inheritdoc */
    protected string $symbol = "mi";

    /** @inheritdoc */
    protected int|float $multiplier = 1609334*(10**-3);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
