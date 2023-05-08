<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yotta;

/**
 * Class YottaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YottaMeter extends Meter
{
    use Yotta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}