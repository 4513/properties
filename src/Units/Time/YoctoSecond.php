<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class YoctoSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YoctoSecond extends Second
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
