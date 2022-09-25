<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Exa;

/**
 * Class ExaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ExaMeter extends Meter
{
    use Exa;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
