<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Acceleration;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Acceleration;
use MiBo\Properties\Suffixes\Squared;

/**
 * Class MeterPerSecondSquared
 *
 * @package MiBo\Properties\Units\Acceleration
 */
class MeterPerSecondSquared extends NumericalUnit
{
    use IsSI;

    use Squared {
        Squared::getMultiplier as subcontractGetMultiplier;
        Squared::useMultiplier as subcontractUseMultiplier;
    }

    /** @inheritdoc */
    protected string $name = "meter per second squared";

    /** @inheritdoc */
    protected string $symbol = "m/s";

    protected const QUANTITY = Acceleration::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
