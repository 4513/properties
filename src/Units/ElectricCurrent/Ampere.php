<?php

namespace MiBo\Properties\Units\ElectricCurrent;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\ElectricCurrent;

/**
 * Class Ampere
 *
 * @package MiBo\Properties\Units\ElectricCurrent
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Ampere extends Unit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "ampere";

    /** @inheritdoc */
    protected string $symbol = "A";

    protected const QUANTITY = ElectricCurrent::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
