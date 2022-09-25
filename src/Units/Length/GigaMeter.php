<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class GigaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class GigaMeter extends Meter
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
