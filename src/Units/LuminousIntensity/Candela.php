<?php

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\LuminousIntensity;

/**
 * Class Candela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Candela extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "candela";

    /** @inheritdoc */
    protected string $symbol = "cd";

    protected const QUANTITY = LuminousIntensity::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
