<?php

namespace MiBo\Properties\Units\NoQuantity;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\NoQuantity;

/**
 * Class NoUnit
 *
 * @package MiBo\Properties\Units\NoQuantity
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NoUnit extends Unit
{
    /** @inheritdoc */
    protected string $name = "";

    /** @inheritdoc */
    protected string $symbol = "";

    /** @inheritdoc */
    protected const QUANTITY = NoQuantity::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
