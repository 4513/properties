<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Slug
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Slug extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "slug";

    /** @inheritdoc */
    protected string $symbol = "slug";

    /** @inheritdoc */
    protected int|float $multiplier = 14_593_902_940*(10**-6);

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
