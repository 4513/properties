<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yotta;

/**
 * Class YottaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YottaGram extends Gram
{
    use Yotta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
