<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Mass;

/**
 * Class Gram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Gram extends Unit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "gram";

    /** @inheritdoc */
    protected string $symbol = "g";

    protected const QUANTITY = Mass::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
