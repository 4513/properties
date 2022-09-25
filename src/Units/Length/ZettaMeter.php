<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zetta;

/**
 * Class ZettaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZettaMeter extends Meter
{
    use Zetta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
