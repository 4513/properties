<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zepto;

/**
 * Class ZeptoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZeptoMeter extends Meter
{
    use Zepto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
