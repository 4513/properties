<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deca;

/**
 * Class DecaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DecaMeter extends Meter
{
    use Deca;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
