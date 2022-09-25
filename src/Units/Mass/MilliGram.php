<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Milli;

/**
 * Class MilliGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MilliGram extends Gram
{
    use Milli;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
