<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class AstronomicalUnit
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AstronomicalUnit extends Unit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "astronomical unit";

    /** @inheritdoc */
    protected string $symbol = "au";

    /** @inheritdoc */
    protected int|float $multiplier = 149_597_870_700;

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
