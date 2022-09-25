<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Kilo;

/**
 * Class KiloGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class KiloGram extends Gram
{
    use Kilo;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
