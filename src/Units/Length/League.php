<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class League
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class League extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "league";

    /** @inheritdoc */
    protected string $symbol = "lea";

    /** @inheritdoc */
    protected int|float $multiplier = 4828032*(10**-3);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
