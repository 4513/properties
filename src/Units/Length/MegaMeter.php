<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Mega;

/**
 * Class MegaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MegaMeter extends Meter
{
    use Mega;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
